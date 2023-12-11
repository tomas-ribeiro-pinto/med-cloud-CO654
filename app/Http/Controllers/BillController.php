<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::all();

        return view('bills/index', compact("bills"));
    }

    public function create(): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'patient_id' => ['required'],
            'hospital_id' => ['required'],
            'description' => ['required', 'max:100'],
            'amount' => ['required', 'numeric'],
        ]);

        $bill = Bill::create([
            'patient_id' => request('patient_id'),
            'hospital_id' => request('hospital_id'),
            'description' => request('description'),
            'amount' => request('amount'),
        ]);

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
            $bill->delete();
        }

        return back()->with('message', 'Record Removed!');
    }
}
