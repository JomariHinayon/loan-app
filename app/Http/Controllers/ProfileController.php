<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Application;
use App\Models\Loan;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function viewLoanList(): View
    {   
        $userId = Auth::user()->id;
        $loans = Loan::where('user_id', $userId)->get();
        $applications = Application::where('user_id', $userId)
                        ->where(function ($query) {
                        $query->where('loan_status', 'process')
                        ->orWhere('loan_status', 'pending')
                        ->orWhere('loan_status', 'approved');
                    })
                    ->get();;
                                    
        return view('loan-list', compact('loans', 'applications'));
    }

    public function viewLoan($id): View
    {   
        $loan = Loan::where('id', $id)->first();
                                    
        return view('loan', compact('loan'));
    }

}
