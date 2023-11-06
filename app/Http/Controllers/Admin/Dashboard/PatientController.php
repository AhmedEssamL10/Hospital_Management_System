<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{

    public function index()
    {
        $patients = Patient::select(
            'en_name',
            'ar_name',
            'en_address',
            'ar_address',
            App::getLocale() . '_name as name',
            App::getLocale() . '_address as address',
            'email',
            'phone',
            'national_id',
            'status',
            'gender',
            'blood_group',
            'birth_date',
            'created_at',
            'id'
        )->get();
        return view('dashboard.pages.patient.patients', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'en_name' => 'required|string|max:50',
            'ar_name' => 'required|string|max:50',
            'en_address' => 'required|string|max:70',
            'ar_address' => 'required|string|max:70',
            'status' => 'required|in:0,1',
            'gender' => 'required|in:m,f',
            'blood_group' => 'required|in:+A,-A,+B,-B,+AB,-AB,+O,-O',
            'email' => 'required|email',
            'national_id' => 'required|max:14|min:14',
            'birth_date' => 'required',
            'phone' => 'required'
        ]);
        Patient::create([
            'en_name' => $request->en_name,
            'ar_name' => $request->ar_name,
            'en_address' => $request->en_address,
            'ar_address' => $request->ar_address,
            'status' => $request->status,
            'email' => $request->email,
            'password' => Hash::make($request->national_id),
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'national_id' => $request->national_id,
            'blood_group' => $request->blood_group,
            'gender' => $request->gender,
        ]);

        return back()->with('success', 'Patient is updated success');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'en_name' => 'required|string|max:50',
            'ar_name' => 'required|string|max:50',
            'en_address' => 'required|string|max:70',
            'ar_address' => 'required|string|max:70',
            'status' => 'required|in:0,1',
            'gender' => 'required|in:m,f',
            'blood_group' => 'required|in:+A,-A,+B,-B,+AB,-AB,+O,-O',
            'email' => 'required|email',
            'national_id' => 'required|max:14|min:14',
            'birth_date' => 'required',
            'phone' => 'required'
        ]);
        Patient::where('id', $id)->update([
            'en_name' => $request->en_name,
            'ar_name' => $request->ar_name,
            'en_address' => $request->en_address,
            'ar_address' => $request->ar_address,
            'status' => $request->status,
            'email' => $request->email,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'national_id' => $request->national_id,
            'blood_group' => $request->blood_group,
            'gender' => $request->gender,
        ]);

        return back()->with('success', 'Section is updated success');
    }

    public function destroy($id)
    {
        Patient::where('id', $id)->delete();

        return back()->with('success', 'Patient is deleted success');
    }
}
