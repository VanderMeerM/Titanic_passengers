<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $table = 'passengers';

    public const SURNAME = 'Surname';
    public const FIRSTNAMES = 'First Names';
    public const TITLE = 'Title';
    public const AGE = 'Age';
    public const GENDER = 'Gender';
    public const BOARDED = 'Boarded';
    public const INCLASS = 'Class';
    public const SURVVIC = 'Survivor (S) or Victim (V)';
    public const EXTRINF = 'Extra Information';

    protected $primaryKey = '___id';


}


