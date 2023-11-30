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
        $faq = faq::find(request('id'));
        $attributes = request()->validate([
            'question_pt' => ['required', 'max:100'],
            'question_en' => ['required', 'max:100'],
            'question_es' => ['required', 'max:100'],
            'question_it' => ['required', 'max:100'],
            'answer_pt' => ['required', 'max:3000'],
            'answer_en' => ['required', 'max:3000'],
            'answer_es' => ['required', 'max:3000'],
            'answer_it' => ['required', 'max:3000'],
        ]);

        $faq->update($attributes);

        activity()
            ->performedOn($faq)
            ->causedBy(auth()->user())
            ->log('faq Updated by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo Modificado!');
    }

    public function destroy(): \Illuminate\Http\RedirectResponse
    {
        if(request('id'))
        {
            $faq = faq::find(request('id'));
            $faq->delete();
        }

        activity()
            ->performedOn($faq)
            ->causedBy(auth()->user())
            ->log('faq Deleted by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo removido!');
    }
}
