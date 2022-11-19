<?php

namespace App\Http\Controllers\CustomController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public static function categoryList(): \Illuminate\Database\Eloquent\Collection
    {
        return Category::all();
    }

    /**
     * Controller Category for Dashboard
     */
    public function adminCategoryList(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = $this->categoryList();

        return view('admin.categories.categoriesList')->with('categories', $categories);
    }

    public function adminCreateCategory(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.categories.createCategory');
    }

    public function adminSaveCreateCategory(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'showHomepage' => [
                'required',
                Rule::in(['true', 'false']),
            ]
        ]);

        if ($validator->fails()) {
            return back()->withInput();
        }

        $category = new Category;
        $category->name = $request->name;

        if($request->showHomepage == "true"){
            $category->showHomepage = true;
        }
        else {
            $category->showHomepage = false;
        }

        $category->save();

        return redirect()->route('admin.categoryList');
    }

    public function adminModifyCategory(Category $category = null): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.categories.modifyCategory')
            ->with('category', $category);
    }

    public function adminSaveModifyCategory(Request $request, Category $category): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'showHomepage' => [
                'required',
                Rule::in(['true', 'false']),
            ]
        ]);

        if ($validator->fails()) {
            return back()->withInput();
        }

        $category->name = $request->name;

        if($request->showHomepage == "true"){
            $category->showHomepage = true;
        }
        else {
            $category->showHomepage = false;
        }

        $category->save();

        return redirect()->route('admin.categoryList');
    }

    public function adminDeleteCategory(Category $category = null): \Illuminate\Http\RedirectResponse
    {
        $category->delete();

        return redirect()->route('admin.categoryList');
    }
}
