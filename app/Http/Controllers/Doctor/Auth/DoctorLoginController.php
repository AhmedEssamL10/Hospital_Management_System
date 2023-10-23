<?php

namespace App\Http\Controllers\Doctor\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class DoctorLoginController extends Controller
{
    public function create()
    {
        return view('doctor.auth.login');
    }
    public function check(Request $request)
    { {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:8',
            ]);
            if (Auth::guard('doctor')->attempt($request->only('email', 'password'))) {
                return redirect(route('doctor.dashboard'));
            } else {
                return back()->withErrors(['error' => trans('auth.failed')])->withInput(['email' => $request->input('email')]);
            }
        }
    }
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('doctor')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        return redirect('/');
    }
}
