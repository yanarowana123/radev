<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SchoolController;
use App\Models\School;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $service = new \App\Services\SchoolCrudService;
    $service->setModel(School::first())->delete();
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('schools', SchoolController::class)->except(['show']);
    Route::resource('employees', EmployeeController::class)->except(['show']);
});
