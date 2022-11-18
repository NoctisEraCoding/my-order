<?php

namespace App\Http\Controllers\CustomController;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CourierController extends Controller
{
    public static function courierList(): \Illuminate\Database\Eloquent\Collection
    {
        return Courier::all();
    }

    /**
     * Controller Courier for Dashboard
     */
    public function adminCourierList(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $couriers = $this->courierList();

        return view('admin.couriers.couriersList')->with('couriers', $couriers);
    }

    public function adminCreateCourier(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.couriers.createCourier');
    }

    public function adminSaveCreateCourier(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'phone' => 'required|numeric|max_digits:20',
            'avatar' => 'required|image|mimes:jpg,bmp,png,jpeg,webp',
        ]);

        if ($validator->fails()) {
            return back()->withInput();
        }

        $courier = new Courier;
        $courier->name = $request->name;
        $courier->phone = $request->phone;

        $courier->save();

        if($request->has('avatar')) {
            $courier->avatar = $request->avatar->storeAs('couriers/avatar', $courier->id . '.' . $request->avatar->extension(), 'public');
        }

        $courier->save();

        return redirect()->route('admin.courierList');
    }

    public function adminModifyCourier(Courier $courier = null): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.couriers.modifyCourier')
            ->with('courier', $courier);
    }

    public function adminSaveModifyCourier(Request $request, Courier $courier): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'phone' => 'required|numeric|max_digits:20',
            'avatar' => 'image|mimes:jpg,bmp,png,jpeg,webp',
        ]);

        if ($validator->fails()) {
            return back()->withInput();
        }

        $courier->name = $request->name;
        $courier->phone = $request->phone;

        if($request->has('avatar')) {
            $courier->avatar = $request->avatar->storeAs('couriers/avatar', $courier->id . '.' . $request->avatar->extension(), 'public');
        }

        $courier->save();

        return redirect()->route('admin.courierList');
    }

    public function adminDeleteCourier(Courier $courier = null): \Illuminate\Http\RedirectResponse
    {
        Storage::disk('public')->delete($courier->avatar);
        $courier->delete();

        return redirect()->route('admin.courierList');
    }
}
