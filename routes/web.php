<?php

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\SessionController;
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

//  return redirect()->route('all.index', [PassengerController::class, 'getCurrentURL']);


//Route::get('/all/{filter}', [PassengersController::class, 'passageners'])->name('passengers.index');

Route::get('/login', [SessionController::class, 'create'])->name('auth.login');
Route::post('/login', [SessionController::class, 'store']);


 Route::get('/crew', function () {
  return redirect()->route('all.index')
  -> name('crew.index');
 });

 Route::resource('all', PassengerController::class)
->only(['index', 'show', 'update']);

Route::resource('passengers', PassengerController::class)
->only(['index', 'show', 'update']);

Route::resource('crew', PassengerController::class)
->only(['index', 'show', 'update']);

//Route::get('upload', [FileUploadController::class, 'index']);
Route::post('upload', [FileUploadController::class, 'store'])->name('file.store');
/*

 Route::get('/passengers/{passenger}', function(Passenger $passenger) {

  return view('passengers.show', [
    'passenger' =>  $passenger
  ]);
 }) -> name('passengers.show');
  */


  
    

