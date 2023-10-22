<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors =   Doctor::with('section')->select(App::getLocale() . '_name AS name', 'en_name', 'ar_name', 'id', 'status', 'created_at', 'section_id', 'price', 'email', 'phone')->get();
        return view('dashboard.pages.doctor.doctors', compact('doctors'));
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
            'status' => 'required|in:0,1'
        ]);
        Doctor::create([
            'en_name' => $request->en_name,
            'ar_name' => $request->ar_name,
            'status' => $request->status
        ]);
        return redirect(route('sections.index'))->with('success', 'section is created success');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'en_name' => 'required|string|max:50',
            'ar_name' => 'required|string|max:50',
            'status' => 'in:0,1'
        ]);
        Doctor::where('id', $id)->update([
            'en_name' => $request->en_name,
            'ar_name' => $request->ar_name,
            'status' => $request->status
        ]);
        return redirect(route('sections.index'))->with('success', 'section is updated success');
    }

    public function destroy($id)
    {
        Doctor::where('id', $id)->delete();
        return back()->with('success', 'section is deleted success');
    }
}