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

    // Alle unieke waarden voor checkboxes uit database halen..
       $all_ages = Passenger::select('Age')->where('Age','>=','1')->distinct()->orderBy('Age', 'ASC')->get();
       $genders = Passenger::select('Gender')->distinct()->orderBy('Gender', 'ASC')->get();
       $embarked = Passenger::select('Embarked')->distinct()->orderBy('Embarked', 'ASC')->get();
       $classes = Passenger::select('Class')->distinct()->orderBy('Class', 'ASC')->get(); 
       $nationalities = Passenger::select('Nationality')->distinct()->orderBy('Nationality', 'ASC')->get(); 
       $statuses = Passenger::select('Survived')->distinct()->orderBy('Survived', 'ASC')->get(); 
       
       $name = $request->input('name');

       // Waarden aangevinkte checkboxes ophalen  
       $age_value = $request->get('age_value');
       $age_number = $request->get('age_number');
       $gender = $request->get('gender');
       $boarded = $request->get('boarded');
       $class = $request->get('class');
       $nationality = $request->get('nationality');
       $survived = $request->get('survvict');

       $passengers= Passenger::when(
            $name, 
            fn($query, $name) => $query->name($name)
        );

        
           if($gender) {
            $passengers = $passengers
             ->when($age_value) -> where('Age',$age_value, $age_number)
            ->whereIn('Gender', $gender)
            ->whereIn('Embarked', $boarded)
            ->whereIn('Class', $class)
            ->whereIn('Nationality', $nationality)
            ->whereIn('Survived', $survived);
           }
    
         $passengers = $passengers->get();
            
        return view('all.index', [
        'passengers' => $passengers, 
        'all_ages' => $all_ages,
        'genders' => $genders,
        'embarked' => $embarked,
        'statuses' => $statuses,
        'classes' => $classes, 
        'nationalities' => $nationalities,
        'age_value' => $age_value, 
        'age_number' => $age_number,
        'gender_filtered' => $gender,
        'class_filtered' => $class,
        'embarked_filtered' => $boarded,
        'nationalities_filtered' => $nationality,
        'survived_filtered' => $survived                
    ]);
    }

        
    /**
     * Display the specified resource.
     */
    public function show(Passenger $all)
    {
               return view('all.show', 
               ['passenger' => $all, 
               'classes' => Passenger::select('Class')->whereNot('Class', '')->distinct()->orderBy('Class', 'ASC')->get()
                ]);

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

