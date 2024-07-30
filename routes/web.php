<?php

use App\Models\Passenger;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $all_passengers = Passenger::all();

    echo Passenger::count() . '<br>';

    foreach ($all_passengers as $ap) {
       echo '<p>' . $ap['First Names']. ' ' . $ap['Surname'] . '</p>';
    }

    
});

