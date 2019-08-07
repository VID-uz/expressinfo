<?php

namespace App\Http\Controllers\Front;

use App\CguCategories;
use App\Model\CatalogClick;
use App\Http\Controllers\Traits\Tracking\Track;
use App\Model\Catalog;
use App\Model\CatalogCategory;
use Illuminate\Support\Facades\File;
use App\Model\Tag;
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
        return view('front.pages.mobile');
    }

    public function checkCookie()
    {
        return json_encode($_COOKIE);
    }

    public function saveData()
    {
        $post = [];
        $post['age'] = $_POST['age'];
        $post['status'] = $_POST['status'];
        $post['sex'] = $_POST['sex'];
        $post['region'] = $_POST['region'];
        $id = DB::table('user_form')->insertGetId([
            'age' => $_POST['age'], 
            'status' => $_POST['status'], 
            'sex' => $_POST['sex'], 
            'region' => $_POST['region'], 
            'ip_address' => $_SERVER['REMOTE_ADDR']
        ]);
        $post['id'] = $id;
        Cookie::forget('questionare');
        Cookie::queue('questionare', json_encode($post), (60 * 60 * 24 * 30 * 12 * 10));
        return json_encode(['success' => true, 'id' => $id]);
    }

    public function saveData2()
    {
        $files = scandir(public_path() . '/types');
        foreach($files as $file)
        {
            if($file != '.' && $file != '..')
            {
                $item = \App\CguCatalog::create(['category_id' => 10]);
                $item->image =  '/types/' . $file;
                $item->save();
                File::copy(public_path() . '/types/' . $file, public_path() . '/uploads/types/' . $file);
            }
        }
        
    }

    public function categories()
    {
        $categories = CatalogCategory::orderBy('position', 'asc')->where('parent_id', 0)->get();
        
        return view('front.pages.catalog.categories', compact(
            'categories'
        ));
    }
    
    public function categories_mobile()
    {
        $categories = CatalogCategory::orderBy('position', 'asc')->where('parent_id', 0)->get();
        return view('front.pages.catalog.categories_mobile', compact(
            'categories'
        ));
    }

    public function category($id)
    {
        $category = CatalogCategory::findOrFail($id);
        return view('front.pages.catalog.category', compact(
            'category'
        ));
    }

    public function cgu()
    {
        return view('front.pages.cgu');
    }

    public function cgu_info()
    {
        return view('front.pages.info_cgu');
    }

    public function cguInfo()
    {
        $category = CguCategories::findOrFail(4);
        $files = $category->files()->paginate(36);
        $sites = $category->sites()->get();

        return view('front.pages.cgu.categories', compact(
            'category', 'files', 'sites'
        ));
    }

    public function cguAd()
    {
        $category = CguCategories::findOrFail(5);
        $files = $category->files()->paginate(36);
        $sites = $category->sites()->get();

        return view('front.pages.cgu.categories', compact(
            'category', 'files', 'sites'
        ));
    }

    public function cguInfoCategory($id)
    {
        $category = CguCategories::find($id);
        $files = $category->files()->paginate(36);
        $sites = $category->sites()->get();

        return view('front.pages.cgu.category', compact(
            'category', 'files', 'sites'
        ));
    }

    public function cgu_info_inner()
    {
        $files = glob(public_path() . '/files/*.*');
        $arr = [];
        foreach($files as $file)
        {
            $filename = explode('/', $file);
            $arr[] = $filename[7];
        }
        
        return view('front.pages.ad_cgu', compact('arr'));
    }
    
    public function diagram_cgu_info_inner()
    {
        $files = glob(public_path() . '/files/*.*');
        $arr = [];
        foreach($files as $file)
        {
            $filename = explode('/', $file);
            $arr[] = $filename[7];
        }
        
        return view('front.pages.info_cgu_inner', compact('arr'));
    }

    public function cguInfoBuildings()
    {
        $files = glob(public_path() . '/files/*.*');
        $arr = [];
        foreach($files as $file)
        {
            $filename = explode('/', $file);
            $arr[] = $filename[7];
        }
        
        return view('front.pages.cgu_buildings_inner', compact('arr'));
    }

    public function catalog($id)
    {
        $category = CatalogCategory::findOrFail($id);
        $cat = $category->catalogs()->paginate(36);
        $catalogs['active'] = [];
        $catalogs['not'] = [];

        foreach ($cat as $catalog) {
            if($catalog->active == 1)
            {
                $catalogs['active'][] = $catalog;
            }else
            {
                $catalogs['not'][] = $catalog;
            }
        }

        return view('front.pages.catalog.catalog', compact(
            'category', 'catalogs', 'cat'
        ));
    }

    public function catalogSingle($id)
    {
        $item = Catalog::findOrFail($id);

        return view('front.pages.catalog.catalog_single', compact(
            'item'
        ));
    }
    
    public function cguCenters()
    {
        $files = scandir(public_path() . '/gus_uslugi');
        $arr = [];
        foreach($files as $file)
        {
            if($file != '.' && $file != '..')
                $arr[] = $file;
        }
        
        return view('front.pages.cgu_centers', compact('arr'));
    }
    
    public function cguCenter($id)
    {
        $files = scandir(public_path() . '/gus_uslugi');
        $arr = [];
        $diractory = '';
        foreach($files as $file)
        {
            if($file != '.' && $file != '..')
                $arr[] = $file;
        }
        
        $images = [];
        $i = 0;
        foreach($arr as $dir)
        {
            if($i == $id)
            {
                $diractory = $dir;
                $images = glob(public_path() . '/gus_uslugi/' . $dir . '/*.*');
            }
            $i++;
        }
        unset($arr);
        $arr = [];
        foreach($images as $image)
        {
            
            $filename = explode('/', $image);
            $arr[] = $filename[8];
        }
        return view('front.pages.cgu_centers_inner', compact('arr', 'diractory'));
    }

    public function catalog2($id)
    {
        $category = CatalogCategory::findOrFail($id);
        $cat = $category->catalogs()->paginate(28);
        $catalogs['active'] = [];
        $catalogs['not'] = [];

        foreach ($cat as $catalog) {
            if($catalog->active == 1)
            {
                $catalogs['active'][] = $catalog;
            }else
            {
                $catalogs['not'][] = $catalog;
            }
        }

        return view('front.pages.catalog.catalog2', compact(
            'category', 'catalogs', 'cat'
        ));
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        $result = [];
        $empty = false;
        if($search == '')
            $empty = true;
        else{
            $result = Catalog::where('ru_title', 'like', '%' . $request->get('search') . '%')->paginate(28);
        }
        return view('front.pages.catalog.search', compact(
             'result', 'search', 'empty'
        ));
    }

    public function tags(Request $request)
    {
        $categories = CatalogCategory::orderBy('id', 'desc')->where('parent_id', 0)->get();
        $result = Catalog::where('ru_title', 'like', '%' . $request->get('search') . '%')->get();
        $search = $request->get('search');
        $category = $request->get('category');
        return view('front.pages.catalog.search', compact(
            'categories', 'result', 'search', 'category'
        ));
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

    public function categoryCatalogTags(Request $request, $category_id, $tag_id)
    {
        $category = CatalogCategory::findOrFail($category_id);
        $catalogs = $category->catalogs()->get();
        $tag = Tag::findOrFail($tag_id);

        $relation = [];
        $result = [];
        foreach ($catalogs as $catalog)
        {
            $item = DB::table('catalogs_tags')->where('tag_id', $tag_id)->where('catalog_id', $catalog->id)->first();
            if($item != null)
                $relation[] = $item;
        }

        $relation = collect($relation);
        foreach ($relation as $item)
        {
            $catalog = Catalog::findOrFail($item->catalog_id);
            if($catalog != null)
                $result[] = $catalog;
        }
        $result = collect($result);
        return view('front.pages.catalog.tags', compact('result', 'category', 'tag'));
    }
}
