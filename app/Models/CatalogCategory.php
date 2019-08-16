<?php

namespace App\Models;

use App\Models\Helpers\UploadImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CatalogCategory extends Model
{
    use UploadImage;

    protected $fillable = [
        'ru_title', 'en_title', 'uz_title', 'parent_id', 'color'
    ];

    public function children()
    {
        return $this->hasMany('App\Models\CatalogCategory', 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->hasOne('App\Models\CatalogCategory', 'id', 'parent_id');
    }

    public function hasChildren()
    {
        return (isset($this->children[0])) ? true : false;
    }

    public function hasParent()
    {
        return (isset($this->parent[0])) ? true : false;
    }

    public function hasCatalogs()
    {
        return (isset($this->catalogs[0])) ? true : false;
    }

    public function catalogs()
    {
        return $this->hasMany('App\Models\Catalog', 'category_id', 'id')->orderBy('position', 'asc');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'tag_categories', 'category_id', 'tag_id');
    }
}
