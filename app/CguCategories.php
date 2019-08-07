<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CguCategories extends Model
{
    protected $fillable = [
        'ru_title', 'en_title', 'uz_title', 'parent_id'
    ];
    
    
    public function children()
    {
        return $this->hasMany('App\CguCategories', 'parent_id', 'id');
    }

    public function hasChildren()
    {
        return (isset($this->children[0])) ? true : false;
    }

    public function files()
    {
        return $this->hasMany('App\CguCatalog', 'category_id', 'id');
    }

    public function hasFiles()
    {
        return (isset($this->files[0])) ? true : false;
    }

    public function sites()
    {
        return $this->hasMany('App\CguSite', 'category_id', 'id');
    }

    public function hasSites()
    {
        return (isset($this->sites[0])) ? true : false;
    }
    
    
}
