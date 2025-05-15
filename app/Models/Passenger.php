<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

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

public static function get_url(Request $request) {
    $ctg = $request->path();
    $ctg === 'passengers' ? $ctg = ucfirst(substr($ctg, 0, strlen($ctg)-1)) :   
    ($ctg === 'all' ? $ctg = 'Passenger' : null);
     return $ctg;
    
}

public static function get_second_cat(Request $request) {
    $ctg = $request->path();
    $sec_ctg = '';
    $ctg === 'all' ? $sec_ctg = 'Crew' : null;
     return $sec_ctg;
    
}
public static array $status_label = ['Saved' => 'Overleefd', 'Lost' => 'Omgekomen', 'Unknown' => 'Onbekend'];

public static array $gender_label = ['Female' => 'Vrouw', 'Male' => 'Man'];

public static array $nationalities_translated = [
'Amerikaans','Amerikaans, Engels','Amerikaans,Iers','Amerikaans,Siamees','Amerikaans,Zweeds','Armeens,Amerikaans','Armeens,Turks',
'Australisch', 'Oostenrijks','Oostenrijks,Amerikaans','Oostenrijks,Engels','Oostenrijks,Zwitsers','Belgisch','Boheems,Tsjechisch','Bosnisch','Bulgaars',
'Canadees','Canadees,Amerikaans','Canadees,Engels','Kaap Verdisch','Channel Islander','Chinees','Kroatisch','Kroatisch,Italiaans','Deens',
'Deens,Amerikaans','Nederlands','Egyptisch','Engels','Engels,Amerikaans','Engels,Argentijns','Engels,Canadees','Engels,Canadees,Amerikaans',
'Engels,Iers','Engels,Italiaans','Fins','Fins,Amerikaans','Frans','Frans,Canadees','Frans,Engels','Frans,Grieks','Frans,Haïtisch',
'Duits','Duits,Amerikaans','Duits,Engels','Duits,Iers','Duits,Zwitsers','Grieks','Guyanees','Haïtisch','Hong Kongs','Hong Kongs,Chinees',
'Hongaars','Iers','Iers,Amerikaans','Iers,Engels','Italiaans','Italiaans,Amerikaans','Italiaans,Engels','Japans','Lets','Lithouws','Macedonisch,Oostenrijks',
'Madeira,Portugees','Manx','Manx,Amerikaans','Mexicaans','Mexicaans,Amerikaans,Engels','Noors','Noors, Amerikaans','Noors,Amerikaans',
'Peruaans,Engels','Pools','Pools,Amerikaans','Portugees','Roemeens','Russisch','Russisch,Amerikaans','Russisch,Wit-Russisch','Russisch,Lithouws,Engels',
'Russisch,Roemeens','Schots','Schots,Amerikaans','Servisch,Kroaats','Slowaaks','Slowaaks,Frans','Sloveens','Sloveens,Oostenrijks',
'Zuid-Afrikaans','Zuid-Afrikaans,Engels','Spaans','Spaans,Amerikaans','Zweeds','Zweeds, Amerikaans','Zweeds,Amerikaans','Zwitsers','Zwitsers,Amerikaans',
'Syrisch,Amerikaans','Syrisch,Libanees','Turks','Oekraïens,Russisch','Onbekend','Uruguay','Welsh','Welsh,Amerikaans'

];


public static array $age_values = ['>' => 'Ouder dan', '=' => 'Exact', '<' => 'Jonger dan'];

protected $fillable = [
    'Image'
];

/*
public function scopeAge(Builder $query, $age_number ): Builder
{

    return $query
    ->where('Age', '>', $age_number);
} 



public static array $genders = ['Male', 'Female'];
public static array $embarked = ['Belfast', 'Cherbourg', 'Southampton', 'Queenstown']; //Passenger::select('Embarked')->distinct()->orderBy('Embarked', 'ASC')->get()->toArray(); 

public static array $statuses = ['Saved', 'Lost']; // Passenger::select('Survived')->distinct()->orderBy('Survived', 'ASC')->get()->toArray(); 
public static array $nationality = ['Engels', 'Amerikaans']; //Passenger::select('Nationality')->distinct()->orderBy('Nationality', 'ASC')->get()->toArray(); 

public static array $classes = ['1st Class', '2nd Class', '3rd Class']; //Passenger::select('Class')->distinct()->orderBy('Class', 'ASC')->get()->toArray(); 
*/

}
