<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\View\View;


class AddressController extends Controller
{
    public function view_form(): View
    {
        return view('application.form2');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        
        // validate data
        $request->validate([
            'home_ownership' => 'required|string',
            'province' => 'required|string',
            'monthly_rent' => 'integer',
            'current_address' => 'required|string',
            'city' => 'required|string',
            'barangay' => 'required|string',
            'years_living' => 'required|string',
        ]);

         // Retrieve application ID from session
         $newApplicationId = $request->session()->get('new_application_id');

        // save data
        $new_address = new Address([
            'home_ownership' => $request->input('home_ownership'),
            'monthly_rent' => $request->input('monthly_rent'),
            'province' => $request->input('province'),
            'current_address' => $request->input('current_address'),
            'city' => $request->input('city'),
            'barangay' => $request->input('barangay'),
            'years_living' => $request->input('years_living'),
            'application_id' => $newApplicationId
        ]);
        $new_address->save();

        return redirect()->route('address.view_form')->with('success', 'Loan application submitted successfully.');
    }
}
