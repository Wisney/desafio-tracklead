<?php

use Illuminate\Support\Facades\Auth;
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
    return view('livewire.authwire.index');
})->middleware('guest')->name('login');
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->to('/');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/stores', function () {
        return view('livewire.storewire.index');
    });
});
