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
        //
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
        //
    }


    public function destroy($id)
    {
        //
    }
}
