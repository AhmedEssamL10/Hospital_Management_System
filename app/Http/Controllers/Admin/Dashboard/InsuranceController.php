<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Insurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companys = Insurance::select(App::getLocale() . '_name as name', App::getLocale() . '_note as note', 'insurance_code', 'id', 'en_name', 'ar_name', 'status', 'discount_percentage', 'company_rate', 'created_at')->get();
        return view('dashboard.pages.insurance.insurances', compact('companys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            'insurance_code' => uniqid('company_'),
            'discount_percentage' => $request->discount_percentage . '%',
            'company_rate' => $request->company_rate . '%',
            'en_note' => $request->en_note,
            'ar_note' => $request->ar_note
        ]);
        return back()->with('success', 'Company is created success');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
