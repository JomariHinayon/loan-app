<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Payment;
use App\Models\Loan;
use App\Models\Application;

class PaymentController extends Controller
{
    public function createPaymentView(): View
    {
    
        return view('admin.create-payment');
    }

    public function addPayment(Request $request)
    {
        try {
            $request->validate([
                'payment_method' => 'required|in:g-cash,paymaya,manual',
                'loan_number' => 'required',
                'amount_paid' => 'required|numeric',
                'pay_date' => 'required|date',
                'month_paid' => 'required|numeric',
            ]);

            $application = Application::where('loan_number', $request->input('loan_number'))
                                        ->where(function ($query) {
                                        $query->orWhere('loan_status', 'approved');})->first();;
            
            if (!$application) {
                // No loan found, handle the error
                return redirect()->back()->withErrors(['loan' => 'No loan found for the given loan number.'])->withInput();
            }

            $loan = Loan::where('application_id', $application->id)->first();
            
            try{
                $monthlyPayments = $loan->payment_monthly;
                
                if ($loan->payment_monthly[$request->input('month_paid') - 1]['is_paid'] == true) {
                    return redirect()->back()->withErrors(['loan' => 'Month of the given loan number already paid.'])->withInput();
                }

                $monthlyPayments[$request->input('month_paid') - 1]['is_paid'] = true;
                $loan->update(['payment_monthly' => $monthlyPayments]);

            } catch (ValidationException $e) {
                return redirect()->back()->withErrors(['loan' => 'No Months to Pay found for the given loan number.'])->withInput();
            }
            $new_payment = new Payment([
                'payment_method' => $request->input('payment_method'),
                'phone_number' => $request->input('phone_number'),
                'amount_paid' => $request->input('amount_paid'),
                'pay_date' => $request->input('pay_date'),
                'month_paid' => $request->input('month_paid'),
                'loan_id' => $loan->id,
            ]);
            $new_payment->save();

            return redirect()->back()->with('success', 'Payment added successfully!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
