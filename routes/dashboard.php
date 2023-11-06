<?php

use App\Http\Controllers\Admin\Dashboard\DoctorController;
use App\Http\Controllers\Admin\Dashboard\InsuranceController;
use App\Http\Controllers\Admin\Dashboard\PatientController;
use App\Http\Controllers\Admin\Dashboard\SectionController;
use App\Http\Controllers\Admin\Dashboard\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\Ambulance;
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
            return view('doctor.dashboard');
        })->middleware('doctor.auth')->name('doctor.dashboard');
        Route::prefix('/admin/dashboard')->middleware('admin.auth')->group(function () {
            //sections
            Route::resource('/sections', SectionController::class);
            //doctors
            Route::resource('/doctors', DoctorController::class);
            Route::name('doctors.')->group(function () {
                Route::post('/doctors/delete-selected', [DoctorController::class, 'delete_selected'])->name('delete_selected');
                Route::get('/doctor/{section_id}', [DoctorController::class, 'filterBySection'])->name('filterBySection');
            });
            //services
            Route::resource('/services', ServiceController::class);
            //insurances
            Route::resource('/insurance', InsuranceController::class);
            //patients
            Route::resource('/patient', PatientController::class);
            //Ambulance
            Route::resource('/ambulance', AmbulanceController::class);
            //livewire offers
            Route::view('service_offer/create', 'livewire.service-offer.include_create')->name('service_offer.create');
        });
    }
);
