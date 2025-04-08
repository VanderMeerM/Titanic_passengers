<?php

use App\Http\Controllers\PassengerController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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

 Route::get('/crew', function () {
  return redirect()->route('all.index')
  -> name('crew.index');
 });

 Route::resource('all', PassengerController::class)
->only(['index', 'show']);

Route::resource('passengers', PassengerController::class)
->only(['index', 'show']);

Route::resource('crew', PassengerController::class)
->only(['index', 'show']);

Route::resource('uploads', UploadedFile::class)
->only(['store']);

/*

 Route::get('/passengers/{passenger}', function(Passenger $passenger) {

  return view('passengers.show', [
    'passenger' =>  $passenger
  ]);
 }) -> name('passengers.show');
  */


  
    

