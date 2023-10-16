<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function create()
    {
        return view('admin.auth.register');
    }
    public function store(Request $request)
    {
        $admin_key = 'ahmed220123';
        if ($request->admin_key == $admin_key) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Admin::class],
                'admin_key' => ['required', 'string'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'password_confirmation' => ['required']
            ]);
            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            event(new Registered($admin));

            Auth::guard('admin')->login($admin);

            return redirect(RouteServiceProvider::admin);
        } else return back()->with('errorResponse', 'something went wrong');
    }
}
