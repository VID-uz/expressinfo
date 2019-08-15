<?php

namespace App\Http\Controllers\Admin;

use App\CatalogAd;
use App\Models\CguSite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CatalogCategory;
use App\Models\Catalog;
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

    public function searchCatalog(Request $request)
    {
        $texts = Catalog::where('ru_title', 'like', '%' . $request->get('text') . '%')->get()->pluck('id', 'ru_title');
        return json_encode($texts);
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

    public function changePositionSite()
    {
        if($res = CguSite::where('id', $_POST['id'])->where('position', $_POST['position'])->first())
        {
            $res->position = 0;
            $res->save();
        }
        $category = CguSite::findOrFail( (int) $_POST['id']);
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

    public function removeImage($id)
    {
        $img = CatalogAd::find($id);
        $img->removeImage();
        $img->delete();

        return redirect()->back();
    }
}
