<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\Seller;
use LaravelDaily\Invoices\Invoice;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::all();
        $patients = Patient::all();

        return view('bills/index', compact("bills", "patients"));
    }

    public function create(): \Illuminate\Http\RedirectResponse
    {
        $patient = Patient::find(request('patient_id'));
        $tax = 0.15;

        request()->validate([
            'patient_id' => ['required'],
            'description' => ['required', 'max:100'],
            'total_amount' => ['required', 'numeric'],
        ]);

        $bill = Bill::create([
            'patient_id' => request('patient_id'),
            'hospital_id' => $patient->hospital->id,
            'description' => request('description'),
            'total_amount' => request('total_amount') * (1 + $tax),
        ]);

        $bill->save();

        $customer = new Party([
            'name'=> $patient->name,
            'custom_fields' => [
                'email' => $patient->email,
                'Phone Number' => $patient->phone_number,
            ],
        ]);

        $client = new Party([
            'name' => $patient->hospital->name,
            'address' => $patient->hospital->address_line1 . ' ' . $patient->hospital->address_line2,
        ]);

        $notes = [
            'Thank you for choosing MedCloud!',
        ];
        $notes = implode("<br>", $notes);

        $item = InvoiceItem::make(request('description'))->pricePerUnit(request('total_amount'));

        $invoice = Invoice::make('receipt')
            ->seller($client)
            ->buyer($customer)
            ->filename($client->name . '_' . $customer->name . '_' . $bill->id)
            ->taxRate($tax * 100)
            ->addItem($item)
            ->notes($notes)
            ->logo(public_path('logo.png'))
            ->save('public');

        $bill->url_path = $invoice->url();

        $bill->save();

        return back()->with('message', 'Record Added!');
    }

    public function update(): \Illuminate\Http\RedirectResponse
    {
        $bill = Bill::find(request('id'));
        $attributes = request()->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'max:100'],
            'phone_number' => ['required', 'max:10'],
            'dob' => ['required'],
            'gp_name' => ['required', 'max:100'],
            'allergies' => ['required'],
            'medications' => ['required'],
            'address_line1' => ['required', 'max:100'],
            'address_line2' => ['required', 'max:100'],
        ]);

        $bill->update($attributes);

        return back()->with('message', 'Record Modified!');
    }

    public function destroy(): \Illuminate\Http\RedirectResponse
    {
        if(request('id'))
        {
            $bill = Bill::find(request('id'));
//            $filename = explode('/Bills/',$bill->url_path);
//            Storage::disk('s3')->delete('/Bills/'.$filename[1]);
            $bill->delete();
        }

        return back()->with('message', 'Record Removed!');
    }
}
