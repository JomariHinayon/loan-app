<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Employment;
use App\Models\Associate;
use Illuminate\Support\Facades\Storage;
use App\Models\Application;


class EmploymentController extends Controller
{
    public function view_form(): View
    {

        return view('application.form3');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        
        // $request->validate([
        //     'valid_id_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'valid_id_2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        // ]);

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
        
        $fileName1 = time() . '.' . $request->valid_id_1->extension();
        $request->valid_id_1->storeAs('images', $fileName1, 'public');
        
        $fileName2 = time() . '.' . $request->valid_id_2->extension();
        $request->valid_id_2->storeAs('images', $fileName2, 'public');
        
        $application = Application::findOrFail($newApplicationId);
        $application->valid_id1 = $fileName1;
        $application->valid_id2 = $fileName2;
        $application->save();

        return redirect()->route('application.view_loan')->with('success', 'Loan application submitted successfully.');
    }
}
