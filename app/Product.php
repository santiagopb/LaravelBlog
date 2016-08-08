<?php

namespace Cronti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = "products";

    protected $fillable = ['name', 'image', 'description', 'price', 'type', 'public'];
}
