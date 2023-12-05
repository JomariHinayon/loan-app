<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        if ($this->attemptAdminLogin($request)) {
            return redirect()->intended('/admin'); // Redirect to the admin dashboard
        }

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    protected function attemptAdminLogin(LoginRequest $request): bool
    {
        return Auth::guard('admin')->attempt(
            $request->only('email', 'password'),
            $request->filled('remember')
        );
    }
        

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {   
        dd('Logout method is executed');
        // Logout the user from the 'web' guard
        if (auth()->guard('web')->check()) {
            auth()->guard('web')->logout();
        }
        
        if (auth()->guard('admin')->check()) {
            auth()->guard('admin')->logout();
        }

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Redirect to the home page
        return redirect('/');
    }
}
