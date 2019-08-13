<?php
/**
 * Created by PhpStorm.
 * User: Asad
 * Date: 08.08.2019
 * Time: 13:58
 */

namespace App\Models\Helpers;


trait Statistics
{



    public function getMonthClicks()
    {
        return $this
            ->getClicks()
            ->whereMonth('created_at', Carbon::today()->format('m'));
    }

    public function getMonthClicksCount()
    {
        return count($this->getMonthClicks()->get());
    }

    public function getWeekClicks()
    {
        return $this
            ->getMonthClicks()
            ->whereBetween('created_at', [Carbon::now()
                ->startOfWeek(),
                Carbon::now()
                    ->endOfWeek()]);
    }

    public function getWeekClicksCount()
    {
        return count($this->getWeekClicks()->get());
    }

    public function getMondayClicksCount()
    {
        return count($this->getMonthClicks()->whereDay('created_at', Carbon::today()->startOfWeek()->format('d'))->get());
    }

    public function getTuesdayClicksCount()
    {
        $monday = Carbon::today()->startOfWeek();
        $tuesday = Carbon::create($monday->format('Y'), $monday->format('m'), $monday->format('d'))->addDay();
        return count($this->getClicks()->whereDay('created_at', $tuesday->format('d'))->get());
    }

    public function getWednesdayClicksCount()
    {
        $monday = Carbon::today()->startOfWeek();
        $wednesday = Carbon::create($monday->format('Y'), $monday->format('m'), $monday->format('d'))->addDays(2);
        return count($this->getClicks()->whereDay('created_at', $wednesday->format('d'))->get());
    }

    public function getThursdayClicksCount()
    {
        $monday = Carbon::today()->startOfWeek();
        $thursday = Carbon::create($monday->format('Y'), $monday->format('m'), $monday->format('d'))->addDays(3);
        return count($this->getClicks()->whereDay('created_at', $thursday->format('d'))->get());
    }

    public function getFridayClicksCount()
    {
        $monday = Carbon::today()->startOfWeek();
        $friday = Carbon::create($monday->format('Y'), $monday->format('m'), $monday->format('d'))->addDays(4);
        return count($this->getClicks()->whereDay('created_at', $friday->format('d'))->get());
    }

    public function getSaturdayClicksCount()
    {
        $monday = Carbon::today()->startOfWeek();
        $saturday = Carbon::create($monday->format('Y'), $monday->format('m'), $monday->format('d'))->addDays(5);
        return count($this->getClicks()->whereDay('created_at', $saturday->format('d'))->get());
    }

    public function getSundayClicksCount()
    {
        $monday = Carbon::today()->startOfWeek();
        $sunday = Carbon::create($monday->format('Y'), $monday->format('m'), $monday->format('d'))->addDays(6);
        return count($this->getClicks()->whereDay('created_at', $sunday->format('d'))->get());
    }

    public function getOsCount()
    {
        $clicks = $this->getClicks()->get();

        $phones = [];

        foreach ($clicks as $click):
            if(isset($phones[$click->os]))
                $phones[$click->os] = $phones[$click->os] + 1;
            else
                $phones[$click->os] = 1;
        endforeach;

        return $phones;
    }

    public function getOsPercentage()
    {
        $clicks = $this->getClicks()->get();

        $phones = [];

        foreach ($clicks as $click):
            if(isset($phones[$click->os]))
                $phones[$click->os] = $phones[$click->os] + 1;
            else
                $phones[$click->os] = 1;
        endforeach;

        $all = 0;
        foreach ($phones as $phone => $value):
            $all += $value;
        endforeach;

        $percentages = [];
        foreach ($phones as $phone => $value):
            $x = 100 * $value / $all;
            $percentages[$phone] = number_format($x, 2, '.', '');
        endforeach;
        return $percentages;
    }

    public function getBrowserCount()
    {
        $clicks = $this->getClicks()->get();

        $phones = [];

        foreach ($clicks as $click):
            if(isset($phones[$click->browser]))
                $phones[$click->browser] += 1;
            else
                $phones[$click->browser] = 1;
        endforeach;
        return $phones;
    }

    public function getBrowserPercentage()
    {
        $clicks = $this->getClicks()->get();

        $phones = [];

        foreach ($clicks as $click):
            if(isset($phones[$click->browser]))
                $phones[$click->browser] = $phones[$click->browser] + 1;
            else
                $phones[$click->browser] = 1;
        endforeach;

        $all = 0;
        foreach ($phones as $phone => $value):
            $all += $value;
        endforeach;

        $percentages = [];
        foreach ($phones as $phone => $value):
            $x = 100 * $value / $all;
            $percentages[$phone] = number_format($x, 2, '.', '');
        endforeach;
        return $percentages;
    }

    public function getClicks()
    {
        return $this->hasMany('App\Models\CatalogClick', 'catalog_id', 'id');
    }

    public function getClicksCookie($id)
    {
        return DB::table('user_form')->where('id', $id)->first();
    }

    public function getClickCount()
    {
        return count($this->getClicks);
    }

    public function getMonthAgeStatisticCount()
    {
        $ages = [];
        foreach($this->getClicks as $click)
        {
            $cookie = $this->getClicksCookie($click->user_form_id);
            try{
                $ages[] = $cookie->age;
            }catch(\Exception $e)
            {
            }
        }
        $res = [];
        foreach($ages as $age => $val)
        {
            if($val == 1)
            {
                if(isset($res['from_16_to_24']))
                {
                    $res['from_16_to_24'] += 1;
                }else
                {
                    $res['from_16_to_24'] = 1;
                }
            }
            if($val == 2)
            {
                if(isset($res['from_24_to_32']))
                {
                    $res['from_24_to_32'] += 1;
                }else
                {
                    $res['from_24_to_32'] = 1;
                }
            }

            if($val == 3)
            {
                if(isset($res['from_32_to_45']))
                {
                    $res['from_32_to_45'] += 1;
                }else
                {
                    $res['from_32_to_45'] = 1;
                }
            }
            if($val == 4)
            {
                if(isset($res['from_45_to_60']))
                {
                    $res['from_45_to_60'] += 1;
                }else
                {
                    $res['from_45_to_60'] = 1;
                }
            }
            if($val == 5)
            {
                if(isset($res['60+']))
                {
                    $res['60+'] += 1;
                }else
                {
                    $res['60+'] = 1;
                }
            }
        }

        return $res;
    }

    public function getMonthAgeStatistic()
    {
        $ages = [];
        foreach($this->getClicks as $click)
        {
            $cookie = $this->getClicksCookie($click->user_form_id);
            try{
                $ages[] = $cookie->age;
            }catch(\Exception $e)
            {
            }
        }
        $res = [];
        foreach($ages as $age => $val)
        {
            if($val == 1)
            {
                if(isset($res['from_16_to_24']))
                {
                    $res['from_16_to_24']['num'] += 1;
                }else
                {
                    $res['from_16_to_24']['num'] = 1;
                    $res['from_16_to_24']['legend'] = 'От 16 до 24';
                }
            }
            if($val == 2)
            {
                if(isset($res['from_24_to_32']))
                {
                    $res['from_24_to_32']['num'] += 1;
                }else
                {
                    $res['from_24_to_32']['num'] = 1;
                    $res['from_24_to_32']['legend'] = 'От 24 до 32';
                }
            }

            if($val == 3)
            {
                if(isset($res['from_32_to_45']))
                {
                    $res['from_32_to_45']['num'] += 1;
                }else
                {
                    $res['from_32_to_45']['num'] = 1;
                    $res['from_32_to_45']['legend'] = 'От 32 до 45';
                }
            }
            if($val == 4)
            {
                if(isset($res['from_45_to_60']))
                {
                    $res['from_45_to_60']['num'] += 1;
                }else
                {
                    $res['from_45_to_60']['num'] = 1;
                    $res['from_45_to_60']['legend'] = 'От 45 до 60';
                }
            }
            if($val == 5)
            {
                if(isset($res['60+']))
                {
                    $res['60+']['num'] += 1;
                }else
                {
                    $res['60+']['num'] = 1;
                    $res['60+']['legend'] = '60+';
                }
            }
        }
        $all = 0;
        foreach ($res as $age => $value):
            $all += $value['num'];
        endforeach;
        $percentages = [];

        foreach ($res as $age => $value):
            $x = 100 * $value['num'] / $all;
            $lastAge = $age;
            $percentages[$age]['percent'] = number_format($x, 2, '.', '');
            $percentages[$age]['legend'] = $value['legend'];
        endforeach;
        return $percentages;
    }

    public function getMonthRegionStatisticCount()
    {
        $region = [];
        foreach($this->getClicks as $click)
        {
            $cookie = $this->getClicksCookie($click->user_form_id);
            try{
                $region[] = $cookie->region;
            }catch(\Exception $e)
            {
            }
        }
        $res = [];
        foreach($region as $city => $val)
        {
            if($val == 1)
            {
                if(isset($res['Tashkent']))
                {
                    $res['Tashkent'] += 1;
                }
                else{
                    $res['Tashkent'] = 1;
                }
            }
            if($val == 2)
            {
                if(isset($res['Tashkent_ob']))
                {
                    $res['Tashkent_ob'] += 1;
                }
                else{
                    $res['Tashkent_ob'] = 1;
                }
            }
            if($val == 3)
            {
                if(isset($res['Andijan_ob']))
                {
                    $res['Andijan_ob'] += 1;
                }
                else{
                    $res['Andijan_ob'] = 1;
                }
            }
            if($val == 4)
            {
                if(isset($res['Buxara_ob']))
                {
                    $res['Buxara_ob'] += 1;
                }
                else{
                    $res['Buxara_ob'] = 1;
                }
            }
            if($val == 5)
            {
                if(isset($res['Djizak_ob']))
                {
                    $res['Djizak_ob'] += 1;
                }
                else{
                    $res['Djizak_ob'] = 1;
                }
            }
            if($val == 6)
            {
                if(isset($res['Kashkadarya_ob']))
                {
                    $res['Kashkadarya_ob'] += 1;
                }
                else
                {
                    $res['Kashkadarya_ob'] = 1;
                }
            }
            if($val == 6)
            {
                if(isset($res['Navayi_ob']))
                {
                    $res['Navayi_ob'] += 1;
                }else
                {
                    $res['Navayi_ob'] = 1;
                }
            }
            if($val == 7)
            {
                if(isset($res['Namangan_ob']))
                {
                    $res['Namangan_ob'] += 1;
                }
                else{
                    $res['Namangan_ob'] = 1;
                }
            }
            if($val == 8)
            {
                if(isset($res['Samarkand_ob']))
                {
                    $res['Samarkand_ob'] += 1;
                }
                else{
                    $res['Samarkand_ob'] = 1;
                }
            }
            if($val == 9)
            {
                if(isset($res['Surxandarya_ob']))
                {
                    $res['Surxandarya_ob'] += 1;
                }
                else{
                    $res['Surxandarya_ob'] = 1;
                }
            }
            if($val == 10)
            {
                if(isset($res['Sirdarya_ob']))
                {
                    $res['Sirdarya_ob'] += 1;
                }
                else{
                    $res['Sirdarya_ob'] = 1;
                }
            }
            if($val == 11)
            {
                if(isset($res['Fergana_ob']))
                {
                    $res['Fergana_ob'] += 1;
                }
                else{
                    $res['Fergana_ob'] = 1;
                }
            }
            if($val == 12)
            {
                if(isset($res['Xorezm_ob']))
                {
                    $res['Xorezm_ob'] += 1;
                }
                else{
                    $res['Xorezm_ob'] = 1;
                }
            }
            if($val == 13)
            {
                if(isset($res['Karakalpakistan_res']))
                {
                    $res['Karakalpakistan_res'] += 1;
                }
                else{
                    $res['Karakalpakistan_res'] = 1;
                }
            }
        }
        return $res;
    }

    public function getMonthRegionStatistic()
    {
        $region = [];
        foreach($this->getClicks as $click)
        {
            $cookie = $this->getClicksCookie($click->user_form_id);
            try{
                $region[] = $cookie->region;
            }catch(\Exception $e)
            {
            }
        }
        $res = [];
        foreach($region as $city => $val)
        {
            if($val == 1)
            {
                if(isset($res['Tashkent']))
                {
                    $res['Tashkent']['num'] += 1;
                }else
                {
                    $res['Tashkent']['num'] = 1;
                    $res['Tashkent']['legend'] = 'Ташкент';
                }
            }
            if($val == 2)
            {
                if(isset($res['Tashkent_ob']))
                {
                    $res['Tashkent_ob']['num'] += 1;
                }else
                {
                    $res['Tashkent_ob']['num'] = 1;
                    $res['Tashkent_ob']['legend'] = 'Ташкентская область';
                }
            }
            if($val == 3)
            {
                if(isset($res['Andijan_ob']))
                {
                    $res['Andijan_ob']['num'] += 1;
                }else
                {
                    $res['Andijan_ob']['num'] = 1;
                    $res['Andijan_ob']['legend'] = 'Андижанская область';
                }
            }
            if($val == 4)
            {
                if(isset($res['Buxara_ob']))
                {
                    $res['Buxara_ob']['num'] += 1;
                }else
                {
                    $res['Buxara_ob']['num'] = 1;
                    $res['Buxara_ob']['legend'] = 'Бухарская область';
                }
            }
            if($val == 5)
            {
                if(isset($res['Djizak_ob']))
                {
                    $res['Djizak_ob']['num'] += 1;
                }else
                {
                    $res['Djizak_ob']['num'] = 1;
                    $res['Djizak_ob']['legend'] = 'Джизакская область';
                }
            }
            if($val == 6)
            {
                if(isset($res['Kashkadarya_ob']))
                {
                    $res['Kashkadarya_ob']['num'] += 1;
                }else
                {
                    $res['Kashkadarya_ob']['num'] = 1;
                    $res['Kashkadarya_ob']['legend'] = 'Кашкадарьинская область';
                }
            }
            if($val == 6)
            {
                if(isset($res['Navayi_ob']))
                {
                    $res['Navayi_ob']['num'] += 1;
                }else
                {
                    $res['Navayi_ob']['num'] = 1;
                    $res['Navayi_ob']['legend'] = 'Навоийская область';
                }
            }
            if($val == 7)
            {
                if(isset($res['Namangan_ob']))
                {
                    $res['Namangan_ob']['num'] += 1;
                }else
                {
                    $res['Namangan_ob']['num'] = 1;
                    $res['Namangan_ob']['legend'] = 'Наманганская область';
                }
            }
            if($val == 8)
            {
                if(isset($res['Samarkand_ob']))
                {
                    $res['Samarkand_ob']['num'] += 1;
                }else
                {
                    $res['Samarkand_ob']['num'] = 1;
                    $res['Samarkand_ob']['legend'] = 'Самаркандская область';
                }
            }
            if($val == 9)
            {
                if(isset($res['Surxandarya_ob']))
                {
                    $res['Surxandarya_ob']['num'] += 1;
                }else
                {
                    $res['Surxandarya_ob']['num'] = 1;
                    $res['Surxandarya_ob']['legend'] = 'Сурхандарьинская область';
                }
            }
            if($val == 10)
            {
                if(isset($res['Sirdarya_ob']))
                {
                    $res['Sirdarya_ob']['num'] += 1;
                }else
                {
                    $res['Sirdarya_ob']['num'] = 1;
                    $res['Sirdarya_ob']['legend'] = 'Сырдарьинская область';
                }
            }
            if($val == 11)
            {
                if(isset($res['Fergana_ob']))
                {
                    $res['Fergana_ob']['num'] += 1;
                }else
                {
                    $res['Fergana_ob']['num'] = 1;
                    $res['Fergana_ob']['legend'] = 'Ферганская область';
                }
                }
            if($val == 12)
            {
                if(isset($res['Xorezm_ob']))
                {
                    $res['Xorezm_ob']['num'] += 1;
                }else
                {
                    $res['Xorezm_ob']['num'] = 1;
                    $res['Xorezm_ob']['legend'] = 'Хорезмская область';
                }
            }
            if($val == 13)
            {
                if(isset($res['Karakalpakistan_res']))
                {
                    $res['Karakalpakistan_res']['num'] += 1;
                }else
                {
                    $res['Karakalpakistan_res']['num'] = 1;
                    $res['Karakalpakistan_res']['legend'] = 'Республика Каракалпакстан';
                }
            }
        }
        $all = 0;
        foreach ($res as $city => $value):
            $all += $value['num'];
        endforeach;
        $percentages = [];
        foreach ($res as $city => $value):
            $x = 100 * $value['num'] / $all;
            $lastCity = $city;
            $percentages[$city]['percent'] = number_format($x, 2, '.', '');
            $percentages[$city]['legend'] = $value['legend'];
        endforeach;
        return $percentages;
    }

    public function getStatusCount()
    {
        $region = [];
        foreach($this->getClicks as $click)
        {
            $cookie = $this->getClicksCookie($click->user_form_id);
            try{
                $region[] = $cookie->sex;
            }catch(\Exception $e)
            {
            }
        }
        $res = [];
        foreach($region as $city => $val)
        {
            if($val == 1)
            {
                if(isset($res['pupil']))
                {
                    $res['pupil'] += 1;
                }else
                {
                    $res['pupil'] = 1;
                }
            }
            if($val == 2)
            {
                if(isset($res['soldier']))
                {
                    $res['soldier'] += 1;
                }else
                {
                    $res['soldier'] = 1;
                }
            }
            if($val == 3)
            {
                if(isset($res['unemployed']))
                {
                    $res['unemployed'] += 1;
                }else
                {
                    $res['unemployed'] = 1;
                }
            }
            if($val == 4)
            {
                if(isset($res['retiree']))
                {
                    $res['retiree'] += 1;
                }else
                {
                    $res['retiree'] = 1;
                }
            }
            if($val == 5)
            {
                if(isset($res['housewife']))
                {
                    $res['housewife'] += 1;
                }else
                {
                    $res['housewife'] = 1;
                }
            }
            if($val == 6)
            {
                if(isset($res['entrepreneur']))
                {
                    $res['entrepreneur'] += 1;
                }else
                {
                    $res['entrepreneur'] = 1;
                }
            }
        }

        return $res;
    }

    public function getMonthSexStatisticCount()
    {
        $region = [];
        foreach($this->getClicks as $click)
        {
            $cookie = $this->getClicksCookie($click->user_form_id);
            try{
                $region[] = $cookie->sex;
            }catch(\Exception $e)
            {
            }
        }
        $res = [];
        foreach($region as $city => $val)
        {
            if($val == 1)
            {
                if(isset($res['Male']))
                {
                    $res['Male'] += 1;
                }else
                {
                    $res['Male'] = 1;
                }
            }
            if($val == 2)
            {
                if(isset($res['Female']))
                {
                    $res['Female'] += 1;
                }else
                {
                    $res['Female'] = 1;
                }
            }
        }

        return $res;
    }

    public function getMonthSexStatistic()
    {
        $region = [];
        foreach($this->getClicks as $click)
        {
            $cookie = $this->getClicksCookie($click->user_form_id);
            try{
                $region[] = $cookie->sex;
            }catch(\Exception $e)
            {
            }
        }
        $res = [];
        foreach($region as $city => $val)
        {
            if($val == 1)
            {
                if(isset($res['Male']))
                {
                    $res['Male']['num'] += 1;
                }else
                {
                    $res['Male']['num'] = 1;
                    $res['Male']['legend'] = 'Мужской';
                }
            }
            if($val == 2)
            {
                if(isset($res['Female']))
                {
                    $res['Female']['num'] += 1;
                }else
                {
                    $res['Female']['num'] = 1;
                    $res['Female']['legend'] = 'Женский';
                }
            }
        }
        $all = 0;
        foreach ($res as $sex => $value):
            $all += $value['num'];
        endforeach;
        $percentages = [];
        foreach ($res as $sex => $value):
            if($sex != 'legend'):
                $x = 100 * $value['num'] / $all;
                $lastsex = $sex;
                $percentages[$sex]['percent'] = number_format($x, 2, '.', '');
                $percentages[$sex]['legend'] = $value['legend'];
            endif;
        endforeach;
        return $percentages;
    }

}