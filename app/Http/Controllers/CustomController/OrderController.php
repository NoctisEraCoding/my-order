<?php

namespace App\Http\Controllers\CustomController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showCart(){
        $productsId = session('product');
        $menusId = session('menu');

        $products = ProductController::productList();
        $menus = MenuController::menuList();

        return view('frontend.showCart')
            ->with('products', $products)
            ->with('menus', $menus);
    }
}
