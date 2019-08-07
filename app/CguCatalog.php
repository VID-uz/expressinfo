<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CguCatalog extends Model
{
    protected $fillable = [
        'ru_title', 'en_title', 'uz_title',
        'ru_description', 'en_description', 'uz_description',
        'category_id', 'video', 'active'
    ];

    public function category()
    {
        return $this->hasOne('App\CguCategories', 'id', 'category_id');
    }

    public function hasCategory()
    {
        return ($this->category != null) ? $this->category : false;
    }

    public function uploadImage($image)
    {   
        if($image == null) return;

        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function removeImage()
    {
        if($this->image != null)
            Storage::delete('uploads/' . $this->image);
    }

    public function getFileType()
    {
        $path = public_path() . '/uploads/' . $this->image;
        
        if(file_exists($path))
        {
            return explode('/', File::mimeType($path))[0];
        }else
        {
            return null;
        }
    }

    public function getUrl()
    {
        $path = public_path() . '/uploads/' . $this->image;
        if(File::exists($path))
        {
            return '/uploads/' . $this->image;
        }else
        {
            return null;
        }
    }

    public function getFileName()
    {
        $path = public_path() . '/uploads/' . $this->image;
        if(File::exists($path))
        {
            return explode('/', File::name($path));
        }else
        {
            return null;
        }
    }

    public function getFileSize()
    {
        $path = public_path() . '/uploads/' . $this->image;
        if(File::exists($path))
        {
            return File::size($path);
        }else
        {
            return null;
        }
    }
}
