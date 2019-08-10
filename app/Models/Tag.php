<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'ru_title', 'en_title', 'uz_title', 'active'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\CatalogCategory', 'tag_categories', 'tag_id', 'category_id');
    }

    public function catalogs()
    {
        return $this->belongsToMany('App\Models\Catalog', 'catalogs_tags', 'tag_id', 'catalog_id');
    }
}
