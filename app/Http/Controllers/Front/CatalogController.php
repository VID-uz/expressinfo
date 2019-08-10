<?php

namespace App\Http\Controllers\Front;

use App\Models\Catalog;
use App\Models\CatalogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class CatalogController extends Controller
{

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

    public function categories()
    {
        $categories = CatalogCategory::orderBy('position', 'asc')->where('parent_id', 0)->get();

        return view('front.pages.catalog.categories', compact(
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
