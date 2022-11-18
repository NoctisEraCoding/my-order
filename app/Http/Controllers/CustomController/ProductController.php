<?php

namespace App\Http\Controllers\CustomController;

use App\Http\Controllers\Controller;
use App\Models\Allergen;
use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function adminProductList(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $products = $this->productList();

        return view('admin.products.productsList')->with('products', $products);
    }

    public static function productList(): \Illuminate\Database\Eloquent\Collection
    {
        return Product::all();
    }

    public function adminCreateProduct(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $allergens = Allergen::all();
        $ingredients = Ingredient::all();
        return view('admin.products.createProduct')
            ->with('allergens', $allergens)
            ->with('ingredients', $ingredients);
    }

    public function adminSaveCreateProduct(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'description' => 'required|string',
            'prize' => 'required|numeric',
            'cover' => 'required|image|mimes:jpg,bmp,png,jpeg,webp',
            'images' => 'array|required',
            'images.*' => 'required|mimes:jpg,bmp,png,jpeg,webp',
            'ingredients' => 'array',
            'ingredients.*' => 'required|string',
            'allergens' => 'array',
            'allergens.*' => 'required|string',
            'hidden' => [
                'required',
                Rule::in(['true', 'false']),
            ]
        ]);

        if ($validator->fails()) {
            return back()->withInput();
        }

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->prize = $request->prize;

        if($request->has('ingredients')){
            $product->ingredients = $request->ingredients;
        }

        if($request->has('allergens')){
            $product->allergens = $request->allergens;
        }

        if($request->hidden == "true"){
            $product->hidden = true;
        }
        else {
            $product->hidden = false;
        }

        $product->save();


        if($request->has('cover')) {
            $product->cover = $request->cover->storeAs('products/cover', $product->id . '.' . $request->cover->extension(), 'public');
        }

        if($request->has('images')) {
            $imagesPath = [];
            foreach ($request->images as $key => $image){
                $imagesPath[] = $image->storeAs('products/images', $product->id. '_' . $key . '.' . $image->extension(), 'public');
            }

            $product->images = $imagesPath;
        }

        $product->save();

        return redirect()->route('admin.productList');
    }

    public function adminModifyProduct(Product $product = null): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $allergens = Allergen::all();
        $ingredients = Ingredient::all();
        return view('admin.products.modifyProduct')
            ->with('product', $product)
            ->with('allergens', $allergens)
            ->with('ingredients', $ingredients);
    }

    public function adminSaveModifyProduct(Request $request, Product $product): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'description' => 'required|string',
            'prize' => 'required|numeric',
            'cover' => 'image|mimes:jpg,bmp,png,jpeg,webp',
            'images' => 'array',
            'images.*' => 'required|mimes:jpg,bmp,png,jpeg,webp',
            'ingredients' => 'array',
            'ingredients.*' => 'required|string',
            'allergens' => 'array',
            'allergens.*' => 'required|string',
            'hidden' => [
                'required',
                Rule::in(['true', 'false']),
            ]
        ]);

        if ($validator->fails()) {
            return back()->withInput();
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->prize = $request->prize;

        if($request->has('cover')) {
            $product->cover = $request->cover->storeAs('products/cover', $product->id . '.' . $request->cover->extension(), 'public');
        }

        if($request->has('images')) {
            $imagesPath = [];
            foreach ($request->images as $key => $image){
                $imagesPath[] = $image->storeAs('products/images', $product->id. '_' . $key . '.' . $image->extension(), 'public');
            }

            $product->images = $imagesPath;
        }

        if($request->has('ingredients')){
            $product->ingredients = $request->ingredients;
        }

        if($request->has('allergens')){
            $product->allergens = $request->allergens;
        }

        if($request->hidden == "true"){
            $product->hidden = true;
        }
        else {
            $product->hidden = false;
        }

        $product->save();

        return redirect()->route('admin.productList');
    }

    public function adminDeleteProduct(Product $product = null): \Illuminate\Http\RedirectResponse
    {
        Storage::disk('public')->delete($product->cover);
        Storage::disk('public')->delete($product->images);
        $product->delete();

        return redirect()->route('admin.productList');
    }
}
