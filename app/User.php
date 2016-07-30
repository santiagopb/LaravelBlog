<?php

namespace Cronti;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cronti\Role;

class User extends Authenticatable
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'avatar', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
     * Creo la relacion entre la categories y el posts
     */
    public function posts(){
        return $this->hasMany('Cronti\Post');
    }


    public function roles()
    {
        return $this->belongsToMany('Cronti\Role', 'user_role', 'user_id', 'role_id');
    }

    public function hasAnyRole($roles)
    {
      if(is_array($roles)){
        foreach ($roles as $role) {
          if($this->hasRole($role)){ return true; }
        }
      }else{
        if($this->hasRole($roles)){ return true; }
      }
      return false;
    }

    public function hasRole($role)
    {
      if($this->roles()->where('name', $role)->first()){ return true; }
      return false;
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
