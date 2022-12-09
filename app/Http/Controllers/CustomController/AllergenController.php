<?php

namespace App\Http\Controllers\CustomController;

use App\Http\Controllers\Controller;
use App\Models\Allergen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AllergenController extends Controller
{
    public static function allergenList(): \Illuminate\Database\Eloquent\Collection
    {
        return Allergen::all();
    }

    /**
     * Controller Allergen for Dashboard
     */
    public function adminAllergenList(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $allergens = $this->allergenList();

        return view('admin.allergens.allergensList')->with('allergens', $allergens);
    }

    public function adminCreateAllergen(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.allergens.createAllergens');
    }

    public function adminSaveCreateAllergen(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'allergen' => 'required|string|max:191'
        ]);

        if ($validator->fails()) {
            return back()->withInput();
        }

        $allergens = explode(',', $request->allergen);

        foreach ($allergens as $allergen) {
            $newAllergen = new Allergen;
            $newAllergen->allergen = $allergen;
            $newAllergen->save();
        }

        return redirect()->route('admin.allergenList');
    }

    public function adminModifyAllergen(Allergen $allergen = null): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.allergens.modifyAllergens')
            ->with('allergen', $allergen);
    }

    public function adminSaveModifyAllergen(Request $request, Allergen $allergen): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'allergen' => 'required|string|max:191'
        ]);

        if ($validator->fails()) {
            return back()->withInput();
        }

        $allergen->allergen = $request->allergen;
        $allergen->save();

        return redirect()->route('admin.allergenList');
    }

    public function adminDeleteAllergen(Allergen $allergen = null): \Illuminate\Http\RedirectResponse
    {
        $allergen->delete();

        return redirect()->route('admin.allergenList');
    }
}
