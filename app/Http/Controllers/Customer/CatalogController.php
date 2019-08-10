<?php

namespace App\Http\Controllers\Customer;

use App\Models\Catalog;
use App\Models\CatalogCategory;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalog = Catalog::orderBy('id', 'desc')->where('user_id', Auth::user()->id)->get();

        return view('admin_user.pages.catalog.index', compact(
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
        $categories = CatalogCategory::where('parent_id', 0)->get();
        $users = User::all();
        return view('admin_user.pages.catalog.create', compact(
            'categories', 'users'
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
        if($request->get('parent_id') != null) :
            $item->categories()->attach($request->get('parent_id'));
        endif;


        return redirect()->route('ads.index');
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
        $categories = CatalogCategory::where('parent_id', 0)->get();
        $categories_id = $item->categories()->pluck('category_id')->toArray();
        $users = User::all();

        return view('admin_user.pages.catalog.edit', compact(
            'item', 'categories_id', 'categories', 'users'
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
        $item->categories()->detach();
        if($request->get('parent_id') != null) :
            $item->categories()->attach($request->get('parent_id'));
        endif;

        return redirect()->route('ads.index');
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

        return redirect()->route('ads.index');
    }
}
