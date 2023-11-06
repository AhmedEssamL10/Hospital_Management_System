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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
