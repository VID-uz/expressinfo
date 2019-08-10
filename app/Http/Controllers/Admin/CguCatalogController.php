<?php

namespace App\Http\Controllers\Admin;

use App\Models\CguCategories;
use App\Models\CguCatalog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CguCatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalog = CguCatalog::orderBy('id', 'desc')->get();

        return view('admin.pages.cguCatalogs.index', compact(
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
        $categories = CguCategories::orderBy('id', 'desc')->where('parent_id', 0)->get();
        
        return view('admin.pages.cguCatalogs.create', compact(
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
//        ]);

        $item = CguCatalog::create($request->all());
        $item->uploadImage($request->file('image'));


        return redirect()->route('cgucatalogs.index');
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
        $item = CguCatalog::find($id);
        $categories = CguCategories::orderBy('id', 'desc')->where('parent_id', 0)->get();
        
        return view('admin.pages.cguCatalogs.edit', compact(
            'item', 'categories'
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

        $item = CguCatalog::find($id);
        $item->update($request->all());
        $item->uploadImage($request->file('image'));

        return redirect()->route('cgucatalogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = CguCatalog::findOrFail($id);
        $item->removeImage();
        $item->delete();

        return redirect()->route('cgucatalogs.index');
    }
}
