<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomController\CategoryController;
use App\Http\Controllers\CustomController\HomepageSettingController;
use App\Http\Controllers\CustomController\ProductController;
use App\Models\Ingredient;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homePage(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = CategoryController::categoryList()->where('showHomepage', '=', 1);
        $ingredients = Ingredient::all();
        $menus = Menu::where('from', '<=', date('Y-m-d'))
            ->where('to', '>=', date('Y-m-d'))
            ->get();
        $products = ProductController::productList();
        $sliders = HomepageSettingController::homepageSettingList()->where('show', '=', 1);
        return view('frontend.home')
            ->with('categories', $categories)
            ->with('ingredients', $ingredients)
            ->with('menus', $menus)
            ->with('products', $products)
            ->with('sliders', $sliders);
    }
}
