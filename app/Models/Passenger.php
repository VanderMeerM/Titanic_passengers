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

public static array $age_values = ['>' => 'Ouder dan', '=' => 'Exact', '<' => 'Jonger dan'];
public static array $gender_label = ['Female' => 'Vrouw', 'Male' => 'Man'];
public static array $class_translated = [
    '1st Cabin' => '1e klasse cabine', 
    '1st Class' => '1e klasse',
    '2nd Cabin' => '2e klasse cabine', 
    '2nd Class' => '2e klasse',
    '3rd Cabin' => '3e klasse cabine', 
    '3rd Class' => '3e klasse',
    'A la Carte' => 'À la carte',
    'Deck' => 'Dek',
    'Engine' => 'Machineruimte',
    'Unknown' => 'onbekend',
    'Victualling' => 'Facilitair'
];


public static array $nationalities_translated = 
 [
    "American" => "Amerikaans", "American,English" => "Amerikaans, Engels", "American,Irish" => "Amerikaans,Iers", "American,Siamese" => "Amerikaans,Siamees", "American,Swedish" => "Amerikaans,Zweeds", "Armenian,American" => "Armeens,Amerikaans", "Armenian,Turkish" => "Armeens,Turks", "Australian" => "Australisch", "Belgian" => "Belgisch", "Bohemian,Czech" => "Boheems,Tsjechisch", "Bosnian" => "Bosnisch", "Bulgarian" => "Bulgaars", "Canadian" => "Canadees", "Canadian,American" => "Canadees,Amerikaans", "Canadian,English" => "Canadees,Engels", "Channel Islander" => "Channel Islander", "Chinese" => "Chinees", "Danish" => "Deens", "Danish,American" => "Deens,Amerikaans", "German" => "Duits", "German,American" => "Duits,Amerikaans", "German,English" => "Duits,Engels", "German,Irish" => "Duits,Iers", "German,Swiss" => "Duits,Zwitsers", "Egyptian" => "Egyptisch", "English" => "Engels", "English,American" => "Engels,Amerikaans", "English,Argentinian" => "Engels,Argentijns", "English,Canadian" => "Engels,Canadees", "English,Canadian,American" => "Engels,Canadees,Amerikaans", "English,Irish" => "Engels,Iers", "English,Italian" => "Engels,Italiaans", "Finnish" => "Fins", "Finnish,American" => "Fins,Amerikaans", "French" => "Frans", "French,Canadian" => "Frans,Canadees", "French,English" => "Frans,Engels", "French,Greek" => "Frans,Grieks", "French,Haitian" => "Frans,Haïtisch", "Greek" => "Grieks", "Guyanese" => "Guyanees", "Haitian" => "Haïtisch", "Hong Kongese" => "Hong Kongs", "Hong Kongese,Chinese" => "Hong Kongs,Chinees", "Hungarian" => "Hongaars", "Irish" => "Iers", "Irish,American" => "Iers,Amerikaans", "Irish,English" => "Iers,Engels", "Italian" => "Italiaans", "Italian,American" => "Italiaans,Amerikaans", "Italian,English" => "Italiaans,Engels", "Japanese" => "Japans", "Cape Verdean" => "Kaap Verdisch", "Croatian" => "Kroatisch", "Croatian,Italian" => "Kroatisch,Italiaans", "Latvian" => "Lets", "Lithuanian" => "Lithouws", "Macedonian,Austrian" => "Macedonisch,Oostenrijks", "Madeiran,Portuguese" => "Madeira,Portugees", "Manx" => "Manx", "Manx,American" => "Manx,Amerikaans", "Mexican" => "Mexicaans", "Mexican,American,English" => "Mexicaans,Amerikaans,Engels", "Dutch" => "Nederlands", "Norwegian" => "Noors", "Norwegian, American" => "Noors, Amerikaans", "Norwegian,American" => "Noors,Amerikaans", "Ukrainian,Russian" => "Oekraïens,Russisch", "Unknown" => "onbekend", "Austrian" => "Oostenrijks", "Austrian,American" => "Oostenrijks,Amerikaans", "Austrian,English" => "Oostenrijks,Engels", "Austrian,Swiss" => "Oostenrijks,Zwitsers", "Peruvian,English" => "Peruaans,Engels", "Polish" => "Pools", "Polish,American" => "Pools,Amerikaans", "Portuguese" => "Portugees", "Romanian" => "Roemeens", "Russian" => "Russisch", "Russian,American" => "Russisch,Amerikaans", "Russian,Lithuanian,English" => "Russisch,Lithouws,Engels", "Russian,Romanian" => "Russisch,Roemeens", "Russian,Belorusian" => "Russisch,Wit-Russisch", "Scottish" => "Schots", "Scottish,American" => "Schots,Amerikaans", "Serbian,Croatian" => "Servisch,Kroaats", "Slovenian" => "Sloveens", "Slovenian,Austrian" => "Sloveens,Oostenrijks", "Slovakian" => "Slowaaks", "Slovakian,French" => "Slowaaks,Frans", "Spanish" => "Spaans", "Spanish,American" => "Spaans,Amerikaans", "Syrian,American" => "Syrisch,Amerikaans", "Syrian,Lebanese" => "Syrisch,Libanees", "Turkish" => "Turks", "Uruguayan" => "Uruguayaan", "Welsh" => "Welsh", "Welsh,American" => "Welsh,Amerikaans", "South African" => "Zuid-Afrikaans", "South African,English" => "Zuid-Afrikaans,Engels", "Swedish" => "Zweeds", "Swedish, American" => "Zweeds, Amerikaans", "Swedish,American" => "Zweeds,Amerikaans", "Swiss" => "Zwitsers", "Swiss,American" => "Zwitsers,Amerikaans"
 ];

public static array $status_label = ['Saved' => 'Overleefd', 'Lost' => 'Omgekomen', 'Unknown' => 'onbekend'];

public static array $jobs_translated = [
'Fireman' => 'Stoker', 
'Waiter' => 'Ober',
'Teacher' => 'Leraar',
'Musician' => 'Muzikant'
];

protected $fillable = [
    'Image'
];

}
