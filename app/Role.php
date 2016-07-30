<?php

namespace Cronti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cronti\User;

class Role extends Model
{
    use SoftDeletes;

    public function users() {
      return $this->belongsToMany('Cronti\User', 'user_role', 'role_id', 'user_id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
