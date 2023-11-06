<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{

    public function index()
    {
        $sections = Section::select(App::getLocale() . '_name AS name', 'en_name', 'ar_name', 'id', 'status', App::getLocale() . '_desc AS desc', 'en_desc', 'ar_desc', 'created_at')->get();
        return view('dashboard.pages.section.sections', compact('sections'));
    }

    public function store(Request $request)
    {
        //validation
        $request->validate([
            'en_name' => 'required|string|max:50',
            'ar_name' => 'required|string|max:50',
            'status' => 'required|in:0,1',
            'en_desc' => 'required',
            'ar_desc' => 'required'
        ]);
        Section::create([
            'en_name' => $request->en_name,
            'ar_name' => $request->ar_name,
            'status' => $request->status,
            'en_desc' => $request->en_desc,
            'ar_desc' => $request->ar_desc
        ]);
        return redirect(route('sections.index'))->with('success', 'section is created success');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'en_name' => 'required|string|max:50',
            'ar_name' => 'required|string|max:50',
            'status' => 'in:0,1',
            'en_desc' => 'required',
            'ar_desc' => 'required'
        ]);
        Section::where('id', $id)->update([
            'en_name' => $request->en_name,
            'ar_name' => $request->ar_name,
            'status' => $request->status,
            'en_desc' => $request->en_desc,
            'ar_desc' => $request->ar_desc
        ]);
        return redirect(route('sections.index'))->with('success', 'section is updated success');
    }

    public function destroy($id)
    {
        Section::where('id', $id)->delete();
        return back()->with('success', 'section is deleted success');
    }
}
