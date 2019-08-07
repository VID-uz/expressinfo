<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $now = Carbon::today();

        $startOfWeek = Carbon::today()->startOfWeek();
        $endOfWeek = Carbon::today()->endOfWeek();
        $month = Carbon::today()->format('m');
        $day = Carbon::today()->format('d');

        $catalogs = \Auth::user()->catalogs;
        $monthClicks = \Auth::user()->monthClicks();
        $weekClicks = \Auth::user()->weekClicks();
        $mondayClicks = \Auth::user()->mondayClicks();
        $tuesdayClicks = \Auth::user()->tuesdayClicks();
        $wednesdayClicks = \Auth::user()->wednesdayClicks();
        $thursdayClicks = \Auth::user()->thursdayClicks();
        $fridayClicks = \Auth::user()->fridayClicks();
        $saturdayClicks = \Auth::user()->saturdayClicks();
        $sundayClicks = \Auth::user()->sundayClicks();

        $ages = \Auth::user()->getMonthAgeStatistic();
        $regions = \Auth::user()->getMonthRegionStatistic();
        $sex = \Auth::user()->getMonthSexStatistic();
        $browsers = \Auth::user()->getMonthBrowserStatistic();
        $os = \Auth::user()->getMonthOsStatistic();
        $status = \Auth::user()->getMonthStatusStatistic();

        return view('admin_user.pages.dashboard', compact(
            'monthClicks', 'weekClicks',
            'mondayClicks', 'tuesdayClicks',
            'wednesdayClicks', 'thursdayClicks',
            'fridayClicks', 'saturdayClicks',
            'sundayClicks', 'ages', 
            'regions', 'sex',
            'browsers', 'os', 
            'status'
        ));
    }
}
