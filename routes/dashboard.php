<?php

use App\Http\Controllers\Admin\Dashboard\DoctorController;
use App\Http\Controllers\Admin\Dashboard\SectionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| dashboard  Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () { //...
        Route::get('/admin/dashboard', function () {
            return view('dashboard.index');
        })->middleware('admin.auth')->name('admin.dashboard');
        Route::get('/doctor/dashboard', function () {
            // dd(Auth::guard('doctor')->user());
            return view('doctor.dashboard');
        })->middleware('doctor.auth')->name('doctor.dashboard');
        Route::middleware('admin.auth')->group(function () {
            //sections
            Route::resource('/admin/dashboard/sections', SectionController::class);
            //doctors
            Route::resource('/admin/dashboard/doctors', DoctorController::class);
            Route::post('/admin/dashboard/doctors/delete-selected', [DoctorController::class, 'delete_selected'])->name('doctors.delete_selected');
        });
    }
);
