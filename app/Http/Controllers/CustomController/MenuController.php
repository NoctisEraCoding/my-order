<?php

namespace App\Http\Controllers\CustomController;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MenuController extends Controller
{
    public static function menuList(): \Illuminate\Database\Eloquent\Collection
    {
        return Menu::all();
    }

    /**
     * Controller Menus for Dashboard
     */
    public function adminMenuList(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $menus = $this->menuList();

        return view('admin.menus.menusList')->with('menus', $menus);
    }

    public function adminCreateMenu(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $products = ProductController::productList();
        $prizes = [];

        foreach ($products as $product){
            $prizes[$product->id] = $product->prize;
        }
        return view('admin.menus.createMenu')
            ->with('products', $products)
            ->with('prizes', $prizes);
    }

    public function adminSaveCreateMenu(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'description' => 'required|string',
            'prize' => 'required|numeric',
            'cover' => 'required|image|mimes:jpg,bmp,png,jpeg,webp',
            'products' => 'array',
            'products.*' => 'required|int',
            'from' => 'required',
            'to' => 'required|after:from'
        ]);

        if ($validator->fails()) {
            return back()->withInput();
        }

        $menu = new Menu;
        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->prize = $request->prize;
        $menu->from = $request->from;
        $menu->to = $request->to;
        $menu->save();
        if($request->has('cover')) {
            $menu->cover = $request->cover->storeAs('menus/cover', $menu->id . '.' . $request->cover->extension(), 'public');
        }

        $menu->save();

        if($request->has('products')){
            foreach($request->products as $product){
                $menuProduct = new MenuProduct;
                $menuProduct->menuId = $menu->id;
                $menuProduct->productId = $product;
                $menuProduct->save();
            }
        }

        return redirect()->route('admin.menuList');
    }

    public function adminModifyMenu(Menu $menu): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        $menuProducts = [];
        foreach ($menu->menuProducts as $menuProduct){
            $menuProducts[] = $menuProduct->productId;
        }
        $menu->productsOnMenu = $menuProducts;

        $products = ProductController::productList();
        $prizes = [];

        foreach ($products as $product){
            $prizes[$product->id] = $product->prize;
        }
        return view('admin.menus.modifyMenu')
            ->with('menu', $menu)
            ->with('products', $products)
            ->with('prizes', $prizes);
    }

    public function adminSaveModifyMenu(Request $request, Menu $menu): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'description' => 'required|string',
            'prize' => 'required|numeric',
            'cover' => 'image|mimes:jpg,bmp,png,jpeg,webp',
            'products' => 'array',
            'products.*' => 'required|int',
            'from' => 'required',
            'to' => 'required|after:from'
        ]);

        if ($validator->fails()) {
            return back()->withInput();
        }

        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->prize = $request->prize;
        $menu->from = $request->from;
        $menu->to = $request->to;

        if($request->has('cover')) {
            $menu->cover = $request->cover->storeAs('menus/cover', $menu->id . '.' . $request->cover->extension(), 'public');
        }

        $menu->save();

        if($request->has('products')){
            foreach ($menu->menuProducts as $menuProduct){
                $menuProduct->delete();
            }

            foreach($request->products as $product){
                $menuProduct = new MenuProduct;
                $menuProduct->menuId = $menu->id;
                $menuProduct->productId = $product;
                $menuProduct->save();
            }
        }

        return redirect()->route('admin.menuList');
    }

    public function adminDeleteMenu(Menu $menu = null): \Illuminate\Http\RedirectResponse
    {
        Storage::disk('public')->delete($menu->cover);
        $menu->delete();

        return redirect()->route('admin.menuList');
    }
}
