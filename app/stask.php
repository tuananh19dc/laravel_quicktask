<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stask extends Model
{

    public function users(){
        return $this->belongsToMany('App\User','stask_user','stask_id','user_id');
    }
}
