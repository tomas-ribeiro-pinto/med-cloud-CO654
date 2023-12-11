<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::all();

        return view('patients/index', compact("hospitals"));
    }

    public function show(Hospital $hospital)
    {
        $patients = Patient::where('hospital_id', $hospital->id)->get()->sortBy('name');

        return view('patients/show', compact("patients", "hospital"));
    }

    public function create(Hospital $hospital): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'max:100', 'email'],
            'phone_number' => ['required', 'max:10'],
            'dob' => ['required'],
            'gp_name' => ['required', 'max:100'],
            'address_line1' => ['required', 'max:100'],
            'address_line2' => ['required', 'max:100'],
        ]);

        $patient = Patient::create([
            'name' => request('name'),
            'hospital_id' => $hospital->id,
            'email' => request('email'),
            'phone_number' => request('phone_number'),
            'dob' => request('dob'),
            'gp_name' => request('gp_name'),
            'allergies' => request('allergies'),
            'medications' => request('medications'),
            'address_line1' => request('address_line1'),
            'address_line2' => request('address_line2'),
        ]);

        $patient->save();

        return back()->with('message', 'Record Added!');
    }

    public function update(): \Illuminate\Http\RedirectResponse
    {
        $patient = Patient::find(request('id'));
        $attributes = request()->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'max:100'],
            'phone_number' => ['required', 'max:10'],
            'dob' => ['required'],
            'allergies' => [],
            'medications' => [],
            'gp_name' => ['required', 'max:100'],
            'address_line1' => ['required', 'max:100'],
            'address_line2' => ['required', 'max:100'],
        ]);

        $patient->update($attributes);

        return back()->with('message', 'Record Modified!');
    }

    public function destroy(): \Illuminate\Http\RedirectResponse
    {
        if(request('id'))
        {
            $patient = Patient::find(request('id'));
            $patient->delete();
        }

        return back()->with('message', 'Record Removed!');
    }
}
