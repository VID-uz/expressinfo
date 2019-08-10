<?php

namespace App\Http\Controllers\Front;

use App\Models\CatalogClick;
use App\Http\Controllers\Traits\Tracking\Track;
use App\Models\Catalog;
use App\Models\CatalogCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    use Track;

    public function index()
    {
        return view('front.pages.index');
    }

    public function mobile()
    {
        return view('front.pages.main');
    }

    public function test()
    {
        $catalogs = Catalog::all();
        foreach ($catalogs as $catalog):

            foreach ($catalog->categories as $category):

                $catalog->category_id = $category->id;
                $catalog->save();

            endforeach;

        endforeach;
    }

    public function checkCookie()
    {
        return json_encode($_COOKIE);
    }

    public function redirect(Request $request)
    {
        if(isset($_GET['id'])){
            
            $browser = $this->getBrowser();
            $os = $this->getOs();
            $cookie = json_decode(request()->cookie('questionare'));
            $catalog = Catalog::findOrFail($_GET['id']);
            if($catalog->url != ''):
                try{
    
                    $item = CatalogClick::create(['catalog_id' => $catalog->id, 'browser' => $browser, 'os' => $os, 'user_form_id' => $cookie->id]);
                }catch(\Exception $e)
                {
                    $item = CatalogClick::create(['catalog_id' => $catalog->id, 'browser' => $browser, 'os' => $os]);
                }
            endif;
            if(preg_match('/https/', $catalog->url) || preg_match('/http/', $catalog->url)):
                return redirect($catalog->url);
            else:
                if($catalog->url != '' && $catalog->url != null)
                {
                    return redirect('http://' . $catalog->url);
                }else
                {
                    return redirect('/categories');
                }
            endif;
            return view('extras.redirect', compact(
                'catalog'
            ));
        }else{
            abort(404);
        }
    }
}
