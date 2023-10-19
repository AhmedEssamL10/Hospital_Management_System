<?php
namespace App\Http\Controllers\Admin\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function create()
    {
        return view('admin.auth.login'); 
    }
    public function check(Request $request)
    { {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:8',
            ]);
            if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
                return redirect(route('admin.dashboard'));
            } else {
                return back()->with('error', 'your email or pasword is invalid');
            }
        }
    }
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        return redirect('/');
    }
}