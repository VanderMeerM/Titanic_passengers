<?php

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SessionController;
use App\Models\Passenger;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
 return redirect()->route('all.index');
});

Route::get('/all', function() {
  return redirect()->route('all.index');
});


Route::get('/passengers', function () {
  return redirect()->route('all.index')
  ->name('passengers.index');
});

Route::get('/crew', function () {
  return redirect()->route('all.index')
  -> name('crew.index');
 });


Route::get('/login', [SessionController::class, 'create'])->name('auth.login');
Route::post('/login', [SessionController::class, 'store'])->name('auth.login');


Route::get('/logout', [SessionController::class, 'destroy'])->name('auth.logout');


 Route::resource('all', PassengerController::class)
->only(['index', 'show', 'update']);

Route::resource('passengers', PassengerController::class)
->only(['index', 'show', 'update']);

Route::resource('crew', PassengerController::class)
->only(['index', 'show', 'update']);

Route::post('upload', [FileUploadController::class, 'store'])->name('file.store');



  
    

