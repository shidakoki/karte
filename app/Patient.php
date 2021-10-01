<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'birthday_y' => 'required',
        'birthday_m' => 'required',
        'birthday_d' => 'required',
        'bloodtype' => 'required',
        'height' => 'required',
        'weight' => 'required',
        'keyperson' => 'required',
    );
    public function histories()
    {
        return $this->hasMany('App\History');

    }
}
