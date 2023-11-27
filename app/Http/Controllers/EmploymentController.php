<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Employment;
use App\Models\Associate;


class EmploymentController extends Controller
{
    public function view_form(): View
    {

        return view('application.form3');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        
        // Retrieve application ID from session
        $newApplicationId = $request->session()->get('new_application_id');
        
        $new_employment = new Employment([
            'employment_type' => $request->input('employment_type'),
            'work_nature' => $request->input('work_nature'),
            'company_name' => $request->input('company_name'),
            'company_phone' => $request->input('company_phone'),
            'months_working' => $request->input('months_working'),
            'salary_day' => $request->input('salary_day'),
            'monthly_income' => $request->input('monthly_income'),
            'application_id' => $newApplicationId
        ]);
        $new_employment->save();
        

        $new_associate = new Associate([
            'associate_type' => "relative",
            'name' => $request->input('relative_name'),
            'phone_number' => $request->input('relative_phone'),
            'application_id' => $newApplicationId
        ]);
        $new_associate->save();

        $new_associate2 = new Associate([
            'associate_type' => 'colleague',
            'name' => $request->input('colleague_name'),
            'phone_number' => $request->input('colleague_phone'),
            'application_id' => $newApplicationId
        ]);
        $new_associate2->save();

        return redirect()->route('employment.view_form')->with('success', 'Loan application submitted successfully.');
    }
}
