<?php

use App\Models\Passenger;
use Illuminate\Support\Facades\Route;


//Route::get('', fn() =>to_route('passengers.index'));

Route::get('/passengers', function () {
    return view('index', [
       'passengers' => Passenger::all()
      ]);
  })->name('passengers.index');


 Route::get('/passengers/{passenger}', function(Passenger $passenger) {

        return view('show', [
         'passenger' =>  $passenger
       ]);
   }) -> name('passengers.show');


   /* echo Passenger::count() . '<br>';

    foreach ($all_passengers as $ap) {
       echo '<p>' . $ap['First Names']. ' ' . $ap['Surname'] . '</p>';
    }
*/

    

