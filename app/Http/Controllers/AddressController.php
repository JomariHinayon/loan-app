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
        
        try {
            // Validate data
            $request->validate([
                'home_ownership' => 'required|string|in:Renting,Own - mortgaged,Staying with relatives',
                'province' => 'required|string',
                'monthly_rent' => 'required|integer',
                'current_address' => 'required|string',
                'city' => 'required|string',
                'barangay' => 'required|string',
                'years_living' => 'required|string|in:Less than 1 year,1-3 years,3-5 years,More than 5 years',
            ]);
    
            // Retrieve application ID from session
            $newApplicationId = $request->session()->get('new_application_id');
    
            // Save data
            $new_address = new Address([
                'home_ownership' => $request->input('home_ownership'),
                'monthly_rent' => $request->input('monthly_rent'),
                'province' => $request->input('province'),
                'current_address' => $request->input('current_address'),
                'city' => $request->input('city'),
                'barangay' => $request->input('barangay'),
                'years_living' => $request->input('years_living'),
                'application_id' => $newApplicationId,
            ]);
            $new_address->save();
    
            return redirect()->route('employment.view_form')->with('success', 'Loan application submitted successfully.');
        } catch (ValidationException $e) {
            // If validation fails, redirect back with errors and old input
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }
    }
}
