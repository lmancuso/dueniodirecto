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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/new_property', [App\Http\Controllers\PropertyController::class, 'create'])
    ->name('new_property')
    ->middleware('auth');

Route::post('/new_property', [App\Http\Controllers\PropertyController::class, 'store'])
    ->name('new_property')
    ->middleware('auth');

Route::get('/show_property/{property}', [App\Http\Controllers\PropertyController::class, 'show'])
    ->name('show_property');


Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])
    ->name('profile.edit')
    ->middleware('auth');

Route::post('/profile/edit', [App\Http\Controllers\ProfileController::class, 'update'])
    ->name('profile.update')
    ->middleware('auth');