<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Passenger;


class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

       $all_ages = Passenger::select('age')->where('age','>=','1')->distinct()->orderBy('age', 'ASC')->get();

       $name = $request->input('name');
      
       $age_selector = $request->get('age_value');

       $age_number = $request->get('age_number');

       $passengers= Passenger::when(
            $name,
            fn($query, $name) => $query->name($name)
        );

        /*
        $passengers= Passenger::when(
            $age_selector,
            fn($query, $age_selector, $age_number) => $query->age('Age', $age_selector, $age_number)
        );

*/
      
        $passengers = $passengers->get();

     
        return view('passengers.index', ['passengers' => $passengers, 'all_ages' => $all_ages]);
    }
       
    /**
     * Display the specified resource.
     */
    public function show(Passenger $passenger)
    {
               return view('passengers.show', ['passenger' => $passenger]);

    }

  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'gender' => 'required'
        ]);
    }

}

