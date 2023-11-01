<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{

    public function index()
    {
        $services =   Service::select(App::getLocale() . '_name as name', 'en_name', 'ar_name', 'price', 'id', App::getLocale() . '_desc as desc', 'status', 'created_at', 'updated_at', 'en_desc', 'ar_desc')->get();
        return view('dashboard.pages.service.services', compact('services'));
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
            'en_desc' => 'required',
            'ar_desc' => 'required',
            'price' => 'required'
        ]);
        Service::create([
            'en_name' => $request->en_name,
            'ar_name' => $request->ar_name,
            'status' => $request->status,
            'en_desc' => $request->en_desc,
            'ar_desc' => $request->ar_desc,
            'price' => $request->price
        ]);
        return redirect(route('services.index'))->with('success', 'Service is created success');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'en_name' => 'required|string|max:50',
            'ar_name' => 'required|string|max:50',
            'status' => 'in:0,1',
            'en_desc' => 'required',
            'ar_desc' => 'required',
            'price' => 'required'
        ]);
        Service::where('id', $id)->update([
            'en_name' => $request->en_name,
            'ar_name' => $request->ar_name,
            'status' => $request->status,
            'en_desc' => $request->en_desc,
            'ar_desc' => $request->ar_desc,
            'price' => $request->price

        ]);
        return redirect(route('services.index'))->with('success', 'Service is updated success');
    }


    public function destroy($id)
    {
        Service::where('id', $id)->delete();
        return back()->with('success', 'service is deleted success');
    }
}