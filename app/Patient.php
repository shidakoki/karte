<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'gender' => 'required|integer',
        'birthday_y' => 'required|integer',
        'birthday_m' => 'required|integer',
        'birthday_d' => 'required|integer',
        'bloodtype' => 'integer',
        'height' => 'required|integer',
        'weight' => 'required|integer',
        'keyperson' => 'required',
        'disease' => 'required',
    );
    
    public function histories()
    {
        return $this->hasMany('App\History');

    }
}
