<?php

namespace Cronti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use SoftDeletes;

    protected $table = "categories";

    protected $fillable = ['name', 'slug', 'description'];

    /*
     * Creo la relacion entre la categories y el posts
     */
    public function posts(){
        return $this->hasMany('Cronti\Post');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
