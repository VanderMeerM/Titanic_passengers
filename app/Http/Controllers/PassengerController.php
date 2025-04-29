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

      $current_url = Passenger::get_url($request);

      $second_cat = Passenger::get_second_cat ($request);

      //$current_url = 'all' ? $current_url_2 = 'Crew' : null;     

    // Alle unieke waarden voor checkboxes uit database halen..
       $all_ages = Passenger::select('Age')->where('Category', $current_url)->orWhere('Category', $second_cat)->where('Age','>=','1')->distinct()->orderBy('Age', 'ASC')->get();
       $genders = Passenger::select('Gender')->where('Category', $current_url)->orWhere('Category', $second_cat)->distinct()->orderBy('Gender', 'ASC')->get();
       $embarked = Passenger::select('Embarked')->where('Category', $current_url)->orWhere('Category', $second_cat)->distinct()->orderBy('Embarked', 'ASC')->get();
       $classes = Passenger::select('Class')->where('Category', $current_url)->orWhere('Category', $second_cat)->distinct()->orderBy('Class', 'ASC')->get(); 
       $nationalities = Passenger::select('Nationality')->where('Category', $current_url)->orWhere('Category', $second_cat)->distinct()->orderBy('Nationality', 'ASC')->get(); 
       $statuses = Passenger::select('Survived')->where('Category', $current_url)->orWhere('Category', $second_cat)->distinct()->orderBy('Survived', 'ASC')->get(); 
       
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
    
         $passengers = $passengers->where('Category', $current_url)->orWhere('Category', $second_cat)->get();
            
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
        'survived_filtered' => $survived, 
        'curr_url' => $current_url,   
        'curr_url_2' => $second_cat, 
      ]);
    }

        
    /**
     * Display the specified resource.
     */
    public static function show(Passenger $all)
    {
               return view('all.show', 
               ['passenger' => $all, 
               'classes' => Passenger::select('Class')->whereNot('Class', '')->distinct()->orderBy('Class', 'ASC')->get()
                ]);

    }

  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
      
    }

    public function store(Request $request)
    {
      //
    }

}

