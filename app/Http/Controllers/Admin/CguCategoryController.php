<?php

namespace App\Http\Controllers\Admin;

use App\Models\CguSite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CguCategories;

class CguCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CguCategories::orderBy('id', 'desc')->where('parent_id', 0)->get();

        return view('admin.pages.cguCategories.index', compact(
            'categories'
        ));
    }

    public function categories($id)
    {
        $categories = CguCategories::findOrFail($id)->children;

        return view('admin.pages.cguCategories.categories', compact(
            'categories'
        ));
    }

    public function catalogs($id)
    {
        $category = CguCategories::findOrFail($id);

        return view('admin.pages.cguCategories.catalogs', compact(
            'category'
        ));
    }

    public function sites($id)
    {
        $category = CguCategories::findOrFail($id);
        $sites = $category->sites()->orderBy('position', 'asc')->paginate(10);
        $all = count(CguSite::all());
        return view('admin.pages.cguCategories.sites', compact(
            'sites', 'all'
        ));
    }

    public function create()
    {
        $categories = CguCategories::where('parent_id', 0)->get();
        
        return view('admin.pages.cguCategories.create', compact(
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
        $item = CguCategories::create($request->all());

        return redirect()->route('cgucategories.index');
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
        $category = CguCategories::findOrFail($id);
        $categories = CguCategories::where('parent_id', 0)->get();

        return view('admin.pages.cguCategories.edit', compact(
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

        $item = cguCategories::find($id);
        $item->update($request->all());

        return redirect()->route('cgucategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = cguCategories::findOrFail($id);
        $item->delete();

        return redirect()->route('cgucategories.index');
    }
}
