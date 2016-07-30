<?php

namespace Cronti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tag extends Model
{
    use SoftDeletes;

    protected $table = 'tags';

    protected $fillable = ['name'];
    /**
     * Creo la relacion al modelo entre posts y tags
     */
    public function posts() {
        return $this->belongsToMany('Cronti\Post');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
