<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Section;
use App\Models\WeekDays;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function index()
    {

        $sections = Section::select('id', App::getLocale() . '_name As name')->get();
        $days = WeekDays::all();
        $doctors =   Doctor::with(['section', 'image', 'schedule', 'schedule.days'])->select(App::getLocale() . '_name AS name', 'en_name', 'ar_name', 'id', 'status', 'created_at', 'section_id', 'price', 'email', 'phone')->get();
        return view('dashboard.pages.doctor.doctors', compact('doctors', 'sections', 'days'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //validation
        $request->validate([
            'en_name' => 'required|string|max:50',
            'ar_name' => 'required|string|max:50',
            'status' => 'required|in:0,1',
            'email' => 'required|email|unique:doctors,email',
            'price' => 'required',
            'section' => 'required',
            'phone' => 'required|unique:doctors,phone'
        ]);

        // dd('pass');
        $doctor =    Doctor::create([
            'en_name' => $request->en_name,
            'ar_name' => $request->ar_name,
            'status' => $request->status,
            'email' => $request->email,
            'password' => Hash::make('123456789'),
            'phone' => $request->phone,
            'price' => $request->price,
            'section_id' => $request->section
        ]);
        $days_id = $request->input('days');
        foreach ($days_id as $id) {
            Schedule::create([
                'doctor_id' => $doctor->id,
                'day_id' => $id
            ]);
        }
        return back()->with('success', 'Doctor is created success');
    }

    public function show($id)
    {
        //
    }


    public function filterBySection($id)
    {
        $doctors =   Doctor::with(['section', 'image', 'schedule', 'schedule.days'])->select(App::getLocale() . '_name AS name', 'en_name', 'ar_name', 'id', 'status', 'created_at', 'section_id', 'price', 'email', 'phone')->where('section_id', $id)->get();
        $sections = Section::select('id', App::getLocale() . '_name As name')->get();
        $days = WeekDays::all();
        return view('dashboard.pages.doctor.doctors', compact('doctors', 'sections', 'days'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'en_name' => 'required|string|max:50',
            'ar_name' => 'required|string|max:50',
            'status' => 'in:0,1',
            'email' => 'required|email',
            'price' => 'required',
            'section' => 'required',
            'phone' => 'required'
        ]);
        Doctor::where('id', $id)->update([
            'en_name' => $request->en_name,
            'ar_name' => $request->ar_name,
            'status' => $request->status,
            'email' => $request->email,
            // 'password' => Hash::make('123456789'),
            'phone' => $request->phone,
            'price' => $request->price,
            'section_id' => $request->section
        ]);
        $days_id = $request->input('days');
        Schedule::where('doctor_id', $id)->delete();
        foreach ($days_id as $day_id) {
            Schedule::where('doctor_id', $id)->updateOrCreate([
                'doctor_id' => $id,
                'day_id' => $day_id
            ]);
        }
        return back()->with('success', 'Doctor is updated success');
    }

    public function destroy($id)
    {
        Doctor::where('id', $id)->delete();
        return back()->with('success', 'Doctor is deleted success');
    }
    public function delete_selected(Request $request)
    {
        $Doctors_id = explode(',', $request->delete_select_id);
        foreach ($Doctors_id as $doctor_id) {
            Doctor::where('id', $doctor_id)->delete();
        }
        return back()->with('success', 'Doctors is deleted success');
    }
}
