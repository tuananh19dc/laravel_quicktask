<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    public function users(){
        return $this->belongsTo('App\User');
    }
}
