<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogClick extends Model
{
    protected $fillable = [
        'catalog_id', 'os', 'browser', 'user_form_id'
    ];
}
