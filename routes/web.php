<?php

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
    return view('welcome');
});

Route::resource('/gejala', App\Http\Controllers\SymptomController::class);

Route::resource('/penyakit', App\Http\Controllers\DiseaseController::class);

Route::resource('/aturan', App\Http\Controllers\RuleController::class);

Route::resource('/konsultasi', App\Http\Controllers\ConsultationController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

