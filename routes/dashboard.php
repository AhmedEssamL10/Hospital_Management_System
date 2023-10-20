<?php

use App\Http\Controllers\Admin\Dashboard\SectionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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
        Route::middleware('admin.auth')->group(function () {
            Route::resource('/admin/dashboard/sections', SectionController::class);
        });
    }
);
