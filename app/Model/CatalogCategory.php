<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CatalogCategory extends Model
{
    protected $fillable = [
        'ru_title', 'en_title', 'uz_title', 'parent_id', 'color'
    ];

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

    public function getImage()
    {
        if($this->image != null)
            return '/uploads/' . $this->image;
        else
            return '';
    }

    public function children()
    {
        return $this->hasMany('App\Model\CatalogCategory', 'parent_id', 'id');
    }

    public function hasChildren()
    {
        return (isset($this->children[0])) ? true : false;
    }

    public function hasCatalogs()
    {
        return (isset($this->catalogs[0])) ? true : false;
    }

    public function catalogs()
    {
        return $this->belongsToMany('App\Model\Catalog', 'catalog_category', 'category_id', 'catalog_id')->orderBy('position', 'asc');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Model\Tag', 'tag_categories', 'category_id', 'tag_id');
    }
}
