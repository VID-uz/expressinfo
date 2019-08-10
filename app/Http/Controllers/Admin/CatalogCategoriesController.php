<?php

namespace App\Http\Controllers\Admin;

use App\Models\CatalogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatalogCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CatalogCategory::orderBy('position', 'asc')->where('parent_id', 0)->get();

        return view('admin.pages.catalogCategories.index', compact(
            'categories'
        ));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories($id)
    {
        $categories = CatalogCategory::findOrFail($id)->children;

        return view('admin.pages.catalogCategories.categories', compact(
            'categories'
        ));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function catalogs($id)
    {
        $category = CatalogCategory::findOrFail($id);

        return view('admin.pages.catalogCategories.catalogs', compact(
            'category'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CatalogCategory::where('parent_id', 0)->get();
        return view('admin.pages.catalogCategories.create', compact(
            'categories'
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
//            'image' => 'image'
//        ]);
        $item = CatalogCategory::create($request->all());
        $item->uploadImage($request->file('image'));

        return redirect()->route('catalogcategories.index');
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
        $category = CatalogCategory::findOrFail($id);
        $categories = CatalogCategory::where('parent_id', 0)->get();

        return view('admin.pages.catalogCategories.edit', compact(
            'category', 'categories'
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
//            'image' => 'image'
//        ]);

        $item = CatalogCategory::find($id);
        $item->update($request->all());
        $item->uploadImage($request->file('image'));

        return redirect()->route('catalogcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = CatalogCategory::findOrFail($id);
        $item->removeImage();
        $item->delete();

        return redirect()->route('catalogcategories.index');
    }
}
