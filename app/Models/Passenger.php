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


public function scopeName(Builder $query, string $name ): Builder
{
    return $query
    ->where('First_Names', 'LIKE', '%' . $name . '%') 
    ->orWhere('Surname', 'LIKE', '%' . $name . '%');
} 

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


public static array $genders = ["Male", "Female"];
public static array $boarding_places = ["Belfast", "Cherbourg", "Queenstown", "Southampton"];
public static array $classes = ['1st','2nd','3rd'];
public static array $statuses = ["S", "V"];
public static array $status_labels = ["Overleefd", "Omgekomen"];

}



