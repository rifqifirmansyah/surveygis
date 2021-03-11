<?php

use App\Http\Livewire\AddSurvey;
use App\Http\Livewire\DataSurvey;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/data-survey', [App\Http\Controllers\HomeController::class, 'data']);
Route::post('/add-data', [App\Http\Controllers\HomeController::class, 'store']);
Route::post('/edit-data', [App\Http\Controllers\HomeController::class, 'update']);
Route::delete('/delete/{id}', [App\Http\Controllers\HomeController::class, 'destroy']);

Route::resource('houses', \App\Http\Controllers\HouseController::class)
    ->only(['create', 'store']);

Route::get('cities', [\App\Http\Controllers\CityController::class, 'index'])
    ->name('cities.index');

Route::get('states', [\App\Http\Controllers\StateController::class, 'index'])
    ->name('states.index');