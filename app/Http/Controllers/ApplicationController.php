<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Events\LoanCreated;
use Illuminate\Support\Facades\Auth;
use App\Models\Loan;


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
        
        try {
            // Validate data
            $request->validate([
                'first_name' => 'required|string',
                'middle_name' => 'required|string',
                'last_name' => 'required|string',
                'gender' => 'required|string|in:male,female',
                'phone_number' => 'required|string',
                'birthday' => 'required|date',
            ]);
    
            // Reform birthday
            $birthday = Carbon::createFromFormat('m/d/Y', $request->input('birthday'));
            $formattedBirthday = $birthday->format('Y-m-d');
    
            $userId = Auth::id();
    
            // Save data
            $new_application = new Application([
                'first_name' => $request->input('first_name'),
                'middle_name' => $request->input('middle_name'),
                'last_name' => $request->input('last_name'),
                'gender' => $request->input('gender'),
                'phone_number' => $request->input('phone_number'),
                'birthday' => $formattedBirthday,
                'user_id' => $userId,
            ]);
    
            $new_application->save();
    
            event(new LoanCreated($new_application));
    
            $request->session()->put('new_application_id', $new_application->id);
    
            return redirect()->route('address.view_form')->with('success', 'Loan application submitted successfully.');
        } catch (ValidationException $e) {
            // If validation fails, redirect back with errors
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }
    }

    public function view_loan(): View
    {
        return view('application.form4');
    }

    public function storeLoan(Request $request)
    {
        // dd($request->all());
        
        // validate data
        try {
            
            $request->validate([
                'loan_amount' => 'required|numeric|min:10000|max:50000',
                'months_to_pay' => 'required|in:9,12,24,32,46',
                'loan_purpose' => 'required|string',
            ]);

            $newApplicationId = $request->session()->get('new_application_id');
            $application = Application::findOrFail($newApplicationId);

            $application->loan_amount = $request->input('loan_amount');
            $application->loan_purpose = $request->input('loan_purpose');
            $application->interest_amount = $request->input('interest_amount');
            $application->minimum_payment = $request->input('minimum_payment');
            $application->full_payment = $request->input('full_payment');
            $application->months_to_pay = (int)$request->input('months_to_pay');
            $application->loan_status = "pending";

            $application->save();

            return redirect()->route('application.view_review')->with('success', 'Loan application submitted successfully.');

        } catch (ValidationException $e) {
            // If validation fails, redirect back with errors and old input
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }
    }


    public function view_review(): View
    {
    return view('application.review');
    }

    public function incrementMonths($startDate, $numberOfMonths)
    {
        // Convert the start date to a Carbon instance
        $startDate = Carbon::parse($startDate);

        // Create an array to store the incremented dates
        $resultDates = [];

        // Loop to increment the start date by the specified number of months
        for ($i = 0; $i < $numberOfMonths; $i++) {
            // Add a new date to the result array
            $resultDates[] = $startDate->copy()->addMonths($i);
        }

        return $resultDates;
    }

    public function updateLoanStatus(Request $request, Application $application, $loan_status)
    {
        try {
            // Update the loan_status
            $application->update(['loan_status' => $loan_status]);
            $application->update(['status' => $loan_status]); // Update the status column
            $status = 'success';
            $message = "Loan status updated to $loan_status successfully.";
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Failed to update loan status.';
        }

        if ($loan_status === "approved") {
            $currentDate = Carbon::now();
            $nextMonth = $currentDate->addMonth();

            $application->first_payment_date = $nextMonth;

            $incrementMonth = $nextMonth;

            $startDate = Carbon::parse($application->first_payment_date);

            for ($x = 1; $x <= $application->months_to_pay ; $x++) {

 
                $payments[] = ['month' => $x,
                             'pay_date' => $incrementMonth,
                             'is_paid' => false
                            ];
                // Increment the start date by one month
                $incrementMonth = $incrementMonth->copy()->addMonth();

              }

            $lastPayment = end($payments);

            $lastPaymentMonth = $lastPayment['pay_date'];
            
            //   dd($payments);
            $new_repayment_tracking = new Loan([
                'application_id' => $application->id,
                'start_payment_date' => $nextMonth,
                'end_payment_date' => $lastPaymentMonth,
                'fully_paid' => false,
                'payment_monthly' => $payments,
                'user_id' => $application->user_id,
            ]);
            $new_repayment_tracking->save();

            $application->save();
            $new_repayment_tracking->save();
        }

        // Flash status and message to the session
        $request->session()->flash('status', $status);
        $request->session()->flash('message', $message);

        return redirect()->back(); 
    }


}
