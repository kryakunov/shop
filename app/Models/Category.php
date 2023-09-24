<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public static function add($fields)
    {
    	$category = new static;
    	$category->fill($fields);
    	$category->save();

    	return $category;
    }
}
