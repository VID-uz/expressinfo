<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    protected $table = 'users';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function catalogs()
    {
        return $this->hasMany('App\Models\Catalog', 'user_id', 'id');
    }

    public function monthClicks()
    {
        $clicks = 0;
        $catalogs = $this->catalogs()->get();

        foreach ($catalogs as $catalog):
            $clicks += $catalog->getMonthClicksCount();
        endforeach;

        return $clicks;
    }

    public function weekClicks()
    {
        $clicks = 0;
        $catalogs = $this->catalogs()->get();
            
        foreach ($catalogs as $catalog):
            $clicks += $catalog->getWeekClicksCount();
        endforeach;

        return $clicks;
    }

    public function getMonthAgeStatistic()
    {
        $clicks = [];
        $catalogs = $this->catalogs()->get();
            
        foreach ($catalogs as $catalog):
            foreach ($catalog->getMonthAgeStatisticCount() as $key => $value) {
                if(isset($clicks[$key]))
                {
                    $clicks[$key] += $value;
                }else
                {
                    $clicks[$key] = $value;
                }
            }
        endforeach;

        return $clicks;
    }

    public function getMonthRegionStatistic()
    {
        $clicks = [];
        $catalogs = $this->catalogs()->get();
            
        foreach ($catalogs as $catalog):
            foreach ($catalog->getMonthRegionStatisticCount() as $key => $value) {
                if(isset($clicks[$key]))
                {
                    $clicks[$key] += $value;
                }else
                {
                    $clicks[$key] = $value;
                }
            }
        endforeach;

        return $clicks;
    }

    public function getMonthSexStatistic()
    {
        $clicks = [];
        $catalogs = $this->catalogs()->get();
            
        foreach ($catalogs as $catalog):
            foreach ($catalog->getMonthSexStatisticCount() as $key => $value) {
                if(isset($clicks[$key]))
                {
                    $clicks[$key] += $value;
                }else
                {
                    $clicks[$key] = $value;
                }
            }
        endforeach;

        return $clicks;
    }

    public function getMonthBrowserStatistic()
    {
        $clicks = [];
        $catalogs = $this->catalogs()->get();
            
        foreach ($catalogs as $catalog):
            foreach ($catalog->getBrowserCount() as $key => $value) {
                if(isset($clicks[$key]))
                {
                    $clicks[$key] += $value;
                }else
                {
                    $clicks[$key] = $value;
                }
            }
        endforeach;

        return $clicks;
    }

    public function getMonthStatusStatistic()
    {
        $clicks = [];
        $catalogs = $this->catalogs()->get();
            
        foreach ($catalogs as $catalog):
            foreach ($catalog->getStatusCount() as $key => $value) {
                if(isset($clicks[$key]))
                {
                    $clicks[$key] += $value;
                }else
                {
                    $clicks[$key] = $value;
                }
            }
        endforeach;

        return $clicks;
    }

    public function getMonthOsStatistic()
    {
        $clicks = [];
        $catalogs = $this->catalogs()->get();
            
        foreach ($catalogs as $catalog):
            foreach ($catalog->getOsCount() as $key => $value) {
                if(isset($clicks[$key]))
                {
                    $clicks[$key] += $value;
                }else
                {
                    $clicks[$key] = $value;
                }
            }
        endforeach;

        return $clicks;
    }

    public function mondayClicks()
    {
        $clicks = 0;
        $catalogs = $this->catalogs()->get();

        foreach ($catalogs as $catalog):
            $clicks += $catalog->getMondayClicksCount();
        endforeach;

        return $clicks;
    }

    public function tuesdayClicks()
    {
        $clicks = 0;
        $catalogs = $this->catalogs()->get();

        foreach ($catalogs as $catalog):
            $clicks += $catalog->getTuesdayClicksCount();
        endforeach;

        return $clicks;
    }

    public function wednesdayClicks()
    {
        $clicks = 0;
        $catalogs = $this->catalogs()->get();

        foreach ($catalogs as $catalog):
            $clicks += $catalog->getWednesdayClicksCount();
        endforeach;

        return $clicks;
    }

    public function thursdayClicks()
    {
        $clicks = 0;
        $catalogs = $this->catalogs()->get();

        foreach ($catalogs as $catalog):
            $clicks += $catalog->getThursdayClicksCount();
        endforeach;

        return $clicks;
    }

    public function fridayClicks()
    {
        $clicks = 0;
        $catalogs = $this->catalogs()->get();

        foreach ($catalogs as $catalog):
            $clicks += $catalog->getFridayClicksCount();
        endforeach;

        return $clicks;
    }

    public function saturdayClicks()
    {
        $clicks = 0;
        $catalogs = $this->catalogs()->get();

        foreach ($catalogs as $catalog):
            $clicks += $catalog->getSaturdayClicksCount();
        endforeach;

        return $clicks;
    }

    public function sundayClicks()
    {
        $clicks = 0;
        $catalogs = $this->catalogs()->get();

        foreach ($catalogs as $catalog):
            $clicks += $catalog->getSundayClicksCount();
        endforeach;

        return $clicks;
    }

    public function getRole()
    {
        switch ($this->role_id){
            case 0:
                return 'Обычный пользователь';
                break;
            case 1:
                return '<i style="color: red;">Администратор</i>';
                break;
            case 2:
                return "Пользователь с админ панелью";
                break;
        }
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

    public function getImage()
    {
        if($this->image != null)
            return '/uploads/' . $this->image;
        else
            return asset('assets/img/avatars/avatar9.jpg');
    }

    public function savePassword($password)
    {
        if($password == null) return;

        $this->password = Hash::make($password);
        $this->save();
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}
