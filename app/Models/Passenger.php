<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Passenger extends Model
{

    use HasFactory;

    protected $table = 'passengers';

    public const SURNAME = 'Surname';
    public const FIRSTNAMES = 'First_Names';
    public const TITLE = 'Title';
    public const AGE = 'Age';
    public const GENDER = 'Gender';
    public const BOARDED = 'Boarded';
    public const INCLASS = 'Class';
    public const SURVVIC = 'Survivor_S_or_Victim_V';
    public const EXTRINF = 'Extra_information';
    public const IMAGE = 'Image';
    protected $primaryKey = '___id';


public function scopeName(Builder $query, string $name): Builder
{
    return $query
    ->where('First_Names', 'LIKE', '%' . $name . '%') 
    ->orWhere('Surname', 'LIKE', '%' . $name . '%');
} 

public function scopeAge(Builder $query, $age_selector, $age_number): Builder
{
    return $query
    ->where('Age', $age_selector, $age_number); 
} 

public static array $genders = ["Male", "Female"];
public static array $boarding_places = ["Belfast", "Cherbourg", "Queenstown", "Southampton"];
public static array $classes = [1,2,3];
public static array $statuses = ["Overleefd", "Omgekomen"];

}



