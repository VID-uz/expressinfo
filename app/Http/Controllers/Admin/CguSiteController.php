<?php

namespace App\Http\Controllers\Admin;

use App\Models\CguCategories;
use App\Models\CguSite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CguSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalog = CguSite::orderBy('id', 'desc')->get();

        return view('admin.pages.cguSites.index', compact(
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
        
        return view('admin.pages.cguSites.create', compact(
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

        $item = CguSite::create($request->all());
        $item->uploadImage($request->file('image'));
        if($request->get('category_id') != null)
        {
            $item->position = count(CguCategories::find($request->get('category_id'))->sites()->get());
        }


        return redirect()->route('cgusites.index');
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
        $item = CguSite::find($id);
        $categories = CguCategories::orderBy('id', 'desc')->where('parent_id', 0)->get();
        
        return view('admin.pages.cguSites.edit', compact(
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

        $item = CguSite::find($id);
        $item->update($request->all());
        $item->uploadImage($request->file('image'));

        return redirect()->route('cgusites.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = CguSite::findOrFail($id);
        $item->removeImage();
        $item->delete();

        return redirect()->route('cgusites.index');
    }
}
