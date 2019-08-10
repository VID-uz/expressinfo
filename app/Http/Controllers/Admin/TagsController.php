<?php

namespace App\Http\Controllers\Admin;

use App\Models\CatalogCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('id', 'desc')->get();

        return view('admin.pages.tags.index', compact(
            'tags'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CatalogCategory::orderBy('id', 'desc')->get();
        return view('admin.pages.tags.create', compact(
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

        $item = Tag::create($request->all());
        if($request->get('categories_id') != null) :
            $item->categories()->attach($request->get('categories_id'));
        endif;

        return redirect()->route('catalogtags.index');
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
        $categories = CatalogCategory::orderBy('id', 'desc')->get();
        $tag = Tag::findOrFail($id);
        $categories_id = $tag->categories()->pluck('category_id')->toArray();
        return view('admin.pages.tags.edit', compact(
            'tag', 'categories', 'categories_id'
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

        $tag = Tag::find($id);
        $tag->update($request->all());
        $tag->categories()->detach();
        if($request->get('categories_id') != null) :
            $tag->categories()->attach($request->get('categories_id'));
        endif;

        return redirect()->route('catalogtags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->categories()->detach();
        $tag->delete();

        return redirect()->route('catalogtags.index');
    }
}
