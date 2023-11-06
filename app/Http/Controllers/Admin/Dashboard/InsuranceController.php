<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Insurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class InsuranceController extends Controller
{
    public function index()
    {
        $companys = Insurance::select(App::getLocale() . '_name as name', App::getLocale() . '_note as note', 'en_note', 'ar_note', 'insurance_code', 'id', 'en_name', 'ar_name', 'status', 'discount_percentage', 'company_rate', 'created_at')->get();
        return view('dashboard.pages.insurance.insurances', compact('companys'));
    }

    public function store(Request $request)
    {
        //validation
        $request->validate([
            'en_name' => 'required|string|max:50',
            'ar_name' => 'required|string|max:50',
            'status' => 'required|in:0,1',
            'discount_percentage' => 'required',
            'company_rate' => 'required',
            'en_note' => 'required',
            'ar_note' => 'required',
        ]);

        // dd('pass');
        $company = Insurance::create([
            'en_name' => $request->en_name,
            'ar_name' => $request->ar_name,
            'status' => $request->status,
            'insurance_code' => uniqid($request->en_name),
            'discount_percentage' => $request->discount_percentage . '%',
            'company_rate' => $request->company_rate . '%',
            'en_note' => $request->en_note,
            'ar_note' => $request->ar_note
        ]);
        return back()->with('success', 'Company is created success');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'en_name' => 'required|string|max:50',
            'ar_name' => 'required|string|max:50',
            'status' => 'in:0,1',
            'discount_percentage' => 'required',
            'company_rate' => 'required',
            'en_note' => 'required',
            'ar_note' => 'required',
        ]);
        Insurance::where('id', $id)->update([
            'en_name' => $request->en_name,
            'ar_name' => $request->ar_name,
            'status' => $request->status,
            // 'insurance_code' => uniqid($request->en_name),
            'discount_percentage' => $request->discount_percentage,
            'company_rate' => $request->company_rate,
            'en_note' => $request->en_note,
            'ar_note' => $request->ar_note
        ]);
        return back()->with('success', 'Company is updated success');
    }

    public function destroy($id)
    {
        Insurance::where('id', $id)->delete();
        return back()->with('success', 'Company is deleted success');
    }
}
