<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public static function add($fields)
    {
    	$post = new static;
    	$post->fill($fields);
    	$post->save();

    	return $post;
    }

    public function edit($fields)
    {
    	$this->fill($fields);
    	$this->save();
    }

    public function remove()
    {
    	$this->removeImage();
    	$this->delete();
    }

    public function removeImage()
    {
        if($this->image != null)
        {
            Storage::delete('uploads/' . $this->image);
        }
    }

    public function uploadImage($image)
    {      
    	if($image == null) { return; }

    	$this->removeImage();
    	$filename = \Illuminate\Support\Str::random(10) . '.' . $image->extension();
    	$image->storeAs('uploads', $filename);
    	$this->image = $filename;

    	$this->save();
    }

    public function getImage()
    {
    	if($this->image == null)
    	{
    		return '/uploads/no-image.png';
    	}

    	return '/uploads/' . $this->image;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
