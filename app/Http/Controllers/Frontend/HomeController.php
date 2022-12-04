<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomController\CategoryController;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homePage(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = CategoryController::categoryList()->where('showHomepage', '=', 1);
        $ingredients = Ingredient::all();
        return view('frontend.home')
            ->with('categories', $categories)
            ->with('ingredients', $ingredients);
    }
}
