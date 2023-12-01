<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::all();

        return view('hospitals/index', compact("hospitals"));
    }

    public function create(): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'name' => ['required', 'max:100'],
            'address_line1' => ['required', 'max:100'],
            'address_line2' => ['required', 'max:100'],
        ]);

        $hospital = Hospital::create([
            'name' => request('name'),
            'address_line1' => request('address_line1'),
            'address_line2' => request('address_line2'),
        ]);

        $hospital->save();

        return back()->with('message', 'Record Added!');
    }

    public function update(): \Illuminate\Http\RedirectResponse
    {
        $hospital = Hospital::find(request('id'));
        $attributes = request()->validate([
            'name' => ['required', 'max:100'],
            'address_line1' => ['required', 'max:100'],
            'address_line2' => ['required', 'max:100'],
        ]);

        $hospital->update($attributes);

        return back()->with('message', 'Record Modified!');
    }

    public function destroy(): \Illuminate\Http\RedirectResponse
    {
        if(request('id'))
        {
            $hospital = Hospital::find(request('id'));
            $hospital->delete();
        }

        return back()->with('message', 'Record Removed!');
    }
}
