<?php

namespace App\Models;

use App\Models\Helpers\Statistics;
use App\Models\Helpers\UploadImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class Catalog extends Model
{
    use Statistics, UploadImage;

    protected $fillable = [
        'ru_title', 'uz_title', 'en_title',
        'ru_description', 'uz_description', 'en_description',
        'url', 'user_id', 'active', 'phone_number', 'geo_location', 'logo_url', 'category_id'
    ];

    public function getResizedImage()
    {    
        if($this->image != null && !file_exists(public_path() . '/cache/products/' . $this->image))
        {
            if(!preg_match('/svg/', $this->image))
            {
                $img = \Image::make(public_path() . $this->getImage());
    
    
                $num = $img->width() / $img->height();
                if($img->width() > 150 && $img->width() < 180)
                {
                    if($img->width() == $img->height())
                    {
                        $img->resize(110, 110);
                    }
                    if($img->width() > $img->height())
                    {
                        $img->resize(160, 50);
                    }else
                    {
                        $img->resize(100, 105);
                    }
                    if($img->width() >= 160 && $img->height() <= 60)
                    {
                        $img->resize(160, 50);
                    }
                }
                if($img->width() > 180 && $img->width() < 300)
                {
                    if($img->width() > $img->height())
                    {
                        $img->resize(150, 105);
                    }else
                    {
                        $img->resize(100, 105);
                    }
                }
                if($img->width() > 700 && $img->width() < 900)
                {
                    if($img->width() > $img->height())
                    {
                        $img->resize(150, 100);
                    }else
                    {
                        $img->resize(120, 125);
                    }
                }
                if($img->width() > 500)
                {
                    if($img->width() > $img->height()){
                        $img->resize(300, 100);
                    }else{
                        $img->resize(300, 300);
                    }
                    if($img->width() == $img->height())
                    {
                        $img->resize($img->width() - 200, $img->height() - 200);
                    }
                }
                if($img->width() == 400)
                {
                    $img->resize($img->width() - 300, ($img->height() > 350) ? $img->height() - 300 : 100);
                }
    
                $this->cache_image = $this->image;
                $this->save();
                $img->save(public_path() . '/cache/products/' . $this->cache_image);
    
    
                return '/cache/products/' . $this->cache_image;
            }else
            {
                return '/uploads/' . $this->image;
            }
            
        }else
        {
            return '/cache/products/' . $this->cache_image;
        }
    }


    public function categories()
    {
        return $this->hasOne('App\Models\CatalogCategory', 'id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'catalogs_tags', 'catalog_id', 'tag_id');
    }
}
