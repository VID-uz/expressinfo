<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Traits\Tracking\Track;
use App\Model\Catalog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    use Track;

    public function statistic(Request $request, $id)
    {
        $catalog = Catalog::findOrFail($id);
        $monthClicks = $catalog->getMonthCLicksCount();
        $weekClicks = $catalog->getWeekCLicksCount();
        $mondayClicks = $catalog->getMondayCLicksCount();
        $tuesdayClicks = $catalog->getTuesdayCLicksCount();
        $wednesdayClicks = $catalog->getWednesdayCLicksCount();
        $thursdayClicks = $catalog->getThursdayCLicksCount();
        $fridayClicks = $catalog->getFridayCLicksCount();
        $saturdayClicks = $catalog->getSaturdayCLicksCount();
        $sundayClicks = $catalog->getSundayCLicksCount();

        $osPercentages = $catalog->getOsPercentage();
        $browserPercentages = $catalog->getBrowserPercentage();
        $ages = $catalog->getMonthAgeStatistic();
        $regions = $catalog->getMonthRegionStatistic();
        $sex = $catalog->getMonthSexStatistic();

        return view('admin_user.pages.statistics.statistic', compact(
            'catalog', 'osPercentages', 'browserPercentages',
            'monthClicks', 'weekClicks', 'ages', 'regions', 'sex',
            'mondayClicks', 'tuesdayClicks', 'wednesdayClicks', 'thursdayClicks', 'fridayClicks', 'saturdayClicks', 'sundayClicks'
        ));
    }
}
