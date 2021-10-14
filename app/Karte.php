<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karte extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'patient_id' => 'required',
        'writer_type' => 'required',
        'text' => 'required',
    );
}
