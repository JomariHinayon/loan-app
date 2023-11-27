<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\Application;

class ApplicationController extends Controller
{
    public function view_form(): View
    {
        return view('application.form1');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        
        // validate data
        $request->validate([
            'first_name' => 'required|string',
            'middle_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required|string',
            'phone_number' => 'required|string',
            'birthday' => 'required|date',
        ]);

        // reform birthday
        $birthday = Carbon::createFromFormat('m/d/Y', $request->input('birthday'));
        $formattedBirthday = $birthday->format('Y-m-d');

        // save data
        $new_application = new Application([
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'gender' => $request->input('gender'),
            'phone_number' => $request->input('phone_number'),
            'birthday' => $formattedBirthday,
        ]);
        $new_application->save();

        $request->session()->put('new_application_id', $new_application->id);
        return redirect()->route('address.view_form')->with('success', 'Loan application submitted successfully.');
    }

}
