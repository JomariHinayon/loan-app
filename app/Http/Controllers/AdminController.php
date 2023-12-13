<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Models\Application;
use App\Models\Address;
use App\Models\Employment;
use App\Models\Loan;
use App\Models\Payment;


class AdminController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login-admin');
    }

    public function showRegister(): View
    {
        return view('auth.register-admin');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Admin::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $admin = Admin::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($admin));

        Auth::login($admin);

        return redirect(RouteServiceProvider::HOME);
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    public function showDashboard(): View
    {
        $users = User::all();
        $applications = Application::all();
        $loans = Loan::all();

        return view('admin.dashboard',  compact('users', 'applications', 'loans'));
    }

    public function showUsers(): View
    {
        $users = User::all();


        return view('admin.users', ['users' => $users]);
    }

    public function showApplications(): View
    {
        $applications = Application::all();
        

        return view('admin.applications', ['applications' => $applications]);
    }

    public function showLoans(): View
    {
        $loans = Loan::all();
        

        return view('admin.loans', ['loans' => $loans]);
    }

    public function showPayments(): View
    {
        $payments = Payment::all();
        

        return view('admin.payments', ['payments' => $payments]);
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);

        return view('admin.edit.user', compact('user'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }

    public function editApplication($id)
    {
        $application = Application::findOrFail($id);
        $address = Address::where('application_id', $application->id)->first();
        $employment = Employment::where('application_id', $application->id)->first();


        return view('admin.edit.application', compact('application', 'address', 'employment'));
    }
    
}
