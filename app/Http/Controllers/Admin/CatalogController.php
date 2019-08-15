<?php

namespace App\Http\Controllers\Admin;

use App\CatalogAd;
use App\Models\Catalog;
use App\Models\CatalogCategory;
use App\Models\Tag;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalog = Catalog::orderBy('id', 'desc')->paginate(10);

        return view('admin.pages.catalog.index', compact(
            'catalog'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CatalogCategory::orderBy('id', 'desc')->where('parent_id', 0)->get();
        $users = User::all();
        $tags = Tag::orderBy('id', 'desc')->get();
        return view('admin.pages.catalog.create', compact(
            'categories', 'users', 'tags'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'ru_title' => 'required',
//            'en_title' => 'required',
//            'uz_title' => 'required',
//        ]);

        $item = Catalog::create($request->all());
        $item->uploadImage($request->file('image'));
        if($request->get('category_id') != null) :
            $position = count(CatalogCategory::find($request->get('category_id'))->catalogs()->get());
            $item->position = $position;
            $item->save();
        endif;
        if($request->get('tags') != null) :
            $item->tags()->attach($request->get('tags'));
        endif;


        return redirect()->route('catalog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Catalog::find($id);
        $categories = CatalogCategory::orderBy('id', 'desc')->where('parent_id', 0)->get();

        $categories_list = $item->categories()->get();

        $users = User::all();
        $tags = [];
        foreach ($categories_list as $category)
        {
            foreach ($category->tags()->get() as $tag)
            {
                $tags[] = $tag;
            }
        }
        $tags = collect($tags);
        $tags_id = $item->tags()->pluck('tag_id')->toArray();

        return view('admin.pages.catalog.edit', compact(
            'item', 'categories', 'users', 'tags', 'tags_id'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $request->validate([
//            'ru_title' => 'required',
//            'en_title' => 'required',
//            'uz_title' => 'required',
//        ]);

        $item = Catalog::find($id);
        $item->update($request->all());
        $item->uploadImage($request->file('image'));

        $item->tags()->detach();
        if($request->get('tags_id') != null) :
            $item->tags()->attach($request->get('tags_id'));
        endif;
        if($request->file('catalog_ad') != null)
        {
            foreach ($request->file('catalog_ad') as $image)
            {
                $img = CatalogAd::create(['catalog_id' => $item->id]);
                $img->uploadImage($image);
            }
        }

        return redirect()->route('catalog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Catalog::findOrFail($id);
        $item->removeImage();
        $item->delete();

        return redirect()->route('catalog.index');
    }
}
