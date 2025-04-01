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

       $all_ages = Passenger::select('Age')->where('Age','>=','1')->distinct()->orderBy('Age', 'ASC')->get();

       $name = $request->input('name');

       $age_value = $request->get('age_value');
       $age_number = $request->get('age_number');
       $gender = $request->get('gender');
       $boarded = $request->get('boarded');
       $class = $request->get('class');
       $survived = $request->get('survvict');
       

       $passengers= Passenger::when(
            $name, 
            fn($query, $name) => $query->name($name));

        
           if($gender) {
            $passengers = $passengers
            ->whereIn('Gender', $gender)
            ->when($age_value) -> where('Age',$age_value, $age_number)
            ->whereIn('Embarked', $boarded)
           // ->whereIn('Class', $class)
            ->whereIn('Survived', $survived);
            
           }

        
        
        /*
        $passengers= Passenger::when(
            $age_number, 
            fn($query, $age_number) => $query->age($age_number)
        );
        
       
    
        $passengers= Passenger::when(
            $gender,
            fn($query, $gender) => $query->gender($gender)
            );
            Passenger::when (
                $boarded, 
            fn($query, $boarded) => $query->boarded($boarded),
            fn($query, $class) => $query->class($class),
            fn($query, $survived) => $query->survived($survived)
        );

        /*
           
        $passengers= Passenger::when(
            $boarded, 
            fn($query, $boarded) => $query->boarded($boarded)
        );

        $passengers= Passenger::when(
            $class, 
            fn($query, $class) => $query->class($class)
        );

        $passengers= Passenger::when(
            $survived, 
            fn($query, $survived) => $query->survived($survived)
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

