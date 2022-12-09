<?php

namespace App\Http\Controllers\CustomController;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IngredientController extends Controller
{
    public static function ingredientList(): \Illuminate\Database\Eloquent\Collection
    {
        return Ingredient::all();
    }

    /**
     * Controller Ingredient for Dashboard
     */
    public function adminIngredientList(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $ingredients = $this->ingredientList();

        return view('admin.ingredients.ingredientsList')->with('ingredients', $ingredients);
    }

    public function adminCreateIngredient(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.ingredients.createIngredients');
    }

    public function adminSaveCreateIngredient(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'ingredient' => 'required|string|max:191'
        ]);

        if ($validator->fails()) {
            return back()->withInput();
        }

        $ingredients = explode(',', $request->ingredient);

        foreach ($ingredients as $ingredient) {
            $newIngredient = new Ingredient;
            $newIngredient->ingredient = $ingredient;
            $newIngredient->save();
        }

        return redirect()->route('admin.ingredientList');
    }

    public function adminModifyIngredient(Ingredient $ingredient = null): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.ingredients.modifyIngredients')
            ->with('ingredient', $ingredient);
    }

    public function adminSaveModifyIngredient(Request $request, Ingredient $ingredient): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'ingredient' => 'required|string|max:191'
        ]);

        if ($validator->fails()) {
            return back()->withInput();
        }

        $ingredient->ingredient = $request->ingredient;
        $ingredient->save();

        return redirect()->route('admin.ingredientList');
    }

    public function adminDeleteIngredient(Ingredient $ingredient = null): \Illuminate\Http\RedirectResponse
    {
        $ingredient->delete();

        return redirect()->route('admin.ingredientList');
    }
}
