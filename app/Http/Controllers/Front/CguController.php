<?php

namespace App\Http\Controllers\Front;

use App\Models\CguCategories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CguController extends Controller
{
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

    public function cguCategory($id)
    {
        $category = CguCategories::find($id);
        $files = $category->files()->paginate(24);
        $sites = $category->sites()->get();

        return view('front.pages.cgu.category', compact(
            'category', 'files', 'sites'
        ));
    }
}
