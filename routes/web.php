<?php

use App\Http\Controllers\PassengerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
 return redirect()->route('passengers.index');
});

Route::get('/all', function() {
  return redirect()->route('passengers.index');
});

 Route::get('/crew', function () {
  return redirect()->route('passengers.index');
 });

Route::resource('passengers', PassengerController::class)
->only(['index', 'show', 'all']);


/*

 Route::get('/passengers/{passenger}', function(Passenger $passenger) {

  return view('passengers.show', [
    'passenger' =>  $passenger
  ]);
 }) -> name('passengers.show');
  */


  
    

