<?php

namespace App;

use App\Models\Helpers\UploadImage;
use Illuminate\Database\Eloquent\Model;

class CatalogAd extends Model
{
    use UploadImage;

    protected $fillable = [
        'catalog_id'
    ];
}
