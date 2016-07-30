<?php

namespace Cronti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Post extends Model
{
    use SoftDeletes;

    protected $table = "posts";

    protected $fillable = ['title', 'slug', 'body', 'user_id'];


    /*
     * $cant cantidad de registros de la paginacion
     * Retorna una consulta paginada
     */
    public static function Posts($cant = 10){
        return DB::table('posts')
          ->join('users', 'users.id', '=', 'posts.user_id')
          ->select('posts.*' ,'users.name')
          ->paginate($cant);
    }

    /**
     * Creo la relacion al modelo entre posts y usuario
     */
    public function user() {
        return $this->belongsTo('Cronti\User');
    }

    /**
     * Creo la relacion al modelo entre posts y categories
     */
    public function category() {
        return $this->belongsTo('Cronti\Category');
    }

    /**
     * Creo la relacion al modelo entre posts y tags.
     */
    public function tags() {
        return $this->belongsToMany('Cronti\Tag');
    }

    /**
     * Creo la relacion al modelo entre posts y comments donde parent=0.
     * Si parent > 0 entonces es una replica y no un comentario del post.
     */
    public function comments() {
        return $this->hasMany('Cronti\Comment')->where('parent', 0)->orderBy('created_at', 'desc');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
