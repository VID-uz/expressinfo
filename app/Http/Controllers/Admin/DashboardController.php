<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CatalogCategory;
use App\Model\Catalog;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{

    public function changePosition()
    {
        if($res = CatalogCategory::where('position', $_POST['position'])->first())
        {
            $res->position = 0;
            $res->save();
        }
        $category = CatalogCategory::findOrFail( (int) $_POST['id']);
        $category->position = (int) $_POST['position'];
        if($category->save())
        {
            if($res != null)
                return json_encode(['id' => $res->id, 'position' => $res->position]);
            else
                return 'true';
        }
        else
        {
            return 'false';
        }
    }


    public function changePosition2()
    {
        if($res = Catalog::where('id', $_POST['id'])->where('position', $_POST['position'])->first())
        {
            $res->position = 0;
            $res->save();
        }
        $category = Catalog::findOrFail( (int) $_POST['id']);
        $category->position = (int) $_POST['position'];
        if($category->save())
        {
            if($res != null)
                return json_encode(['id' => $res->id, 'position' => $res->position]);
            else
                return 'true';
        }
        else
        {
            return 'false';
        }
    }
    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }

    public function login()
    {
        return view('admin.pages.loginPage');
    }

    public function dashboardColorChange ()
    {
        if(Cookie::get('dashboardColor') != false)
        {
            if(Cookie::get('dashboardColor') == 'white')
            {
                Cookie::forget('dashboardColor');
                Cookie::queue('dashboardColor', 'black', (60 * 60 * 24 * 30));
            }
            else{
                Cookie::forget('dashboardColor');
                Cookie::queue('dashboardColor', 'white', (60 * 60 * 24 * 30));
            }
        }else{
            Cookie::queue('dashboardColor', 'black', (60 * 60 * 24 * 30));
        }

        return redirect()->route('admin.index');
    }
}
