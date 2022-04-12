<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Scope;
use App\Scopes\isActive as GlobalIsActive;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];
    protected $guarded = ['isAdmin'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

  
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function stasks(){
        return $this->belongsToMany('App\stask', 'stask_user', 'user_id', 'stask_id');
    }
    public function image(){
        return $this->hasOne('App\image');
    }

    public function getFullnameAttribute(){
        return  $this->attributes['first_name']." ".$this->attributes['last_name'];
    }

    public function setPasswordAttribute($username){
        $this->attributes['username'] = Str::of($username)->slug('-');
    }

    public function scopeIsAdmin($query){
        return $query->where('isAdmin','true');
    }

    protected static function booted()
    {
        static::addGlobalScope(new GlobalIsActive);
    }
}
