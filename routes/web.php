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
    // return redirect()->route('login');
});

Route::resource('/gejala', App\Http\Controllers\SymptomController::class);

Route::resource('/penyakit', App\Http\Controllers\DiseaseController::class);

Route::resource('/aturan', App\Http\Controllers\RuleController::class);

Route::resource('/konsultasi', App\Http\Controllers\ConsultationController::class);
Route::get('/rumus/{id}', [\App\Http\Controllers\ConsultationController::class, 'rumus'])->name("konsul.rumus");

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/petunjuk', [App\Http\Controllers\PageController::class, 'petunjuk'])->name('page.petunjuk');
Route::get('/informasi', [App\Http\Controllers\PageController::class, 'informasi'])->name('page.informasi');

Route::resource('/users',App\Http\Controllers\UserController::class);

Route::resource('/himpunan', App\Http\Controllers\HimpunanController::class);

Route::resource('/aturan-tsukamoto', App\Http\Controllers\AturanTsukamotoController::class);

Route::resource('/konsultasi-tsukamoto', App\Http\Controllers\KonsultasiTsukamotoController::class);
Auth::routes();

