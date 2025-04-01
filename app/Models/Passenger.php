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

public function scopeGender(Builder $query, array $gender ): Builder
{
    return $query
    ->whereIn('Gender', $gender);
} 

public function scopeBoarded(Builder $query, array $boarded ): Builder
{
    return $query
    ->whereIn('Boarded', $boarded);
} 

public function scopeClass(Builder $query, array $class ): Builder
{
    return $query
    ->whereIn('Class', $class);
} 

public function scopeSurvived(Builder $query, array $survived ): Builder
{
    return $query
    ->whereIn('Survivor_S_or_Victim_V', $survived);
} 

*/

public static array $genders = ["Male", "Female"];
public static array $embarked = ["Belfast", "Cherbourg", "Queenstown", "Southampton"];

//public static array $classes = ['1st Class','2nd Class','3rd Class']; 
public static array $statuses = ['Saved', 'Lost'];
public static array $nationality = ['American', 'English'];



}



