<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Ambulance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class AmbulanceController extends Controller
{
    public function index()
    {
        $ambulances = Ambulance::select(
            'en_name_driver',
            'ar_name_driver',
            App::getLocale() . '_name_driver as name',
            App::getLocale() . '_note as note',
            'en_note',
            'ar_note',
            'id',
            'car_model',
            'car_number',
            'status',
            'created_at',
            'manufacturing_year',
            'license_number',
            'phone'
        )->get();
        return view('dashboard.pages.ambulance.ambulances', compact('ambulances'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'en_name' => 'required|string|max:50',
            'ar_name' => 'required|string|max:50',
            'en_note' => 'required',
            'ar_note' => 'required',
            'status' => 'required|in:0,1',
            'car_number' => 'required',
            'car_model' => 'required',
            'manufacturing_year' => 'required',
            'license_number' => 'required',
            'phone' => 'required'
        ]);
        Ambulance::create([
            'ar_name_driver' => $request->ar_name,
            'en_name_driver' => $request->en_name,
            'en_note' => $request->en_note,
            'ar_note' => $request->ar_note,
            'status' => $request->status,
            'car_number' => $request->car_number,
            'phone' => $request->phone,
            'car_model' => $request->car_model,
            'manufacturing_year' => $request->manufacturing_year,
            'license_number' => $request->license_number,
        ]);

        return back()->with('success', 'Ambulance is Created success');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'en_name' => 'required|string|max:50',
            'ar_name' => 'required|string|max:50',
            'en_note' => 'required',
            'ar_note' => 'required',
            'status' => 'in:0,1',
            'car_number' => 'required',
            'car_model' => 'required',
            'manufacturing_year' => 'required',
            'license_number' => 'required',
            'phone' => 'required'
        ]);
        Ambulance::where('id', $id)->update([
            'ar_name_driver' => $request->ar_name,
            'en_name_driver' => $request->en_name,
            'en_note' => $request->en_note,
            'ar_note' => $request->ar_note,
            'status' => $request->status,
            'car_number' => $request->car_number,
            'phone' => $request->phone,
            'car_model' => $request->car_model,
            'manufacturing_year' => $request->manufacturing_year,
            'license_number' => $request->license_number,
        ]);

        return back()->with('success', 'Updated is Created success');
    }

    public function destroy($id)
    {
        Ambulance::where('id', $id)->delete();

        return back()->with('success', 'Ambulance is deleted success');
    }
}
