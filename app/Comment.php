<?php

namespace Cronti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comment extends Model
{
    use SoftDeletes;

    protected $table = "comments";

    protected $fillable = ['post_id', 'parent', 'author_name', 'author_email', 'comment', 'approved'];

    /**
     * Creo la relacion al modelo entre comentario y post
     */
    public function post() {
        return $this->belongsTo('Cronti\Post');
    }

    /**
     * Creo la relacion al modelo entre comentario y replicas
     */
    public function reply() {
        return $this->belongsTo('Cronti\Comment', 'parent');
    }
    public function replies() {
        return $this->hasMany('Cronti\Comment', 'parent')->orderBy('created_at', 'desc');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
