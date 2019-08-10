<?php

namespace App\Models;

use App\Models\Helpers\UploadFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CguCatalog extends Model
{
    use UploadFile;

    protected $fillable = [
        'ru_title', 'en_title', 'uz_title',
        'ru_description', 'en_description', 'uz_description',
        'category_id', 'video', 'active'
    ];

    public function category()
    {
        return $this->hasOne('App\Models\CguCategories', 'id', 'category_id');
    }

    public function hasCategory()
    {
        return ($this->category != null) ? $this->category : false;
    }

    public function generateFilename($extension)
    {
        return str_random(10) . '.' . $extension;
    }
}
