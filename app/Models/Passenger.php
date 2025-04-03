<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Passenger extends Model
{

    use HasFactory;

    protected $table = 'passengers';

    public const NAME = 'Name';
    public const AGE = 'Age';
    public const GENDER = 'Gender';
    public const CATEGORY = 'Category';
    public const CLASSNUM = 'Class';
    public const EMBARKED = 'Embarked';
    public const DISEMBARKED = 'Disembarked';
    public const JOB = 'Job';
    public const SURVIVED = 'Survived';
    public const BOAT = 'Boat';
    public const NATIONALITY = 'Nationality';
    public const SHIP = 'Ship';
    public const IMAGE = 'Image';
    protected $primaryKey = 'Id';


public function scopeName(Builder $query, string $name ): Builder
{
    return $query
    ->where('Name', 'LIKE', '%' . $name . '%');
    //->orWhere('Surname', 'LIKE', '%' . $name . '%');
} 

/*
public function scopeAge(Builder $query, $age_number ): Builder
{

    return $query
    ->where('Age', '>', $age_number);
} 



public static array $genders = ['Male', 'Female'];
public static array $embarked = ['Belfast', 'Cherbourg', 'Southampton', 'Queenstown']; //Passenger::select('Embarked')->distinct()->orderBy('Embarked', 'ASC')->get()->toArray(); 

public static array $statuses = ['Saved', 'Lost']; // Passenger::select('Survived')->distinct()->orderBy('Survived', 'ASC')->get()->toArray(); 
public static array $nationality = ['English', 'American']; //Passenger::select('Nationality')->distinct()->orderBy('Nationality', 'ASC')->get()->toArray(); 

public static array $classes = ['1st Class', '2nd Class', '3rd Class']; //Passenger::select('Class')->distinct()->orderBy('Class', 'ASC')->get()->toArray(); 
*/

}
