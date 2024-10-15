<?php

use App\Models\Passenger;
use App\Http\Controllers\PassengerController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
 return redirect()->route('passengers.index');
});

 Route::get('/passengers', function () {

   return view('passengers.index', [
    'passengers' => Passenger::all()
  ]);
 })->name('passengers.index');

 
 Route::get('/passengers/{passenger}', function(Passenger $passenger) {

  return view('passengers.show', [
    'passenger' =>  $passenger
  ]);
 }) -> name('passengers.show');


  
    

