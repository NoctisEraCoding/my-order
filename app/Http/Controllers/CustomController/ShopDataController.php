<?php

namespace App\Http\Controllers\CustomController;

use App\Http\Controllers\Controller;
use App\Models\ShopData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class ShopDataController extends Controller
{
    public static function shopDataList()
    {
        return ShopData::first();
    }

    /**
     * Controller ShopData for Dashboard
     */
    public function adminModifyShopData(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $shopData = self::shopDataList();
        return view('admin.shopData.modifyShopData')
            ->with('shopData', $shopData);
    }

    public function adminSaveModifyShopData(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string|max:191',
            'workDay' => 'required|string|max:191',
            'workHour' => 'required|string|max:191',
            'closedDay' => 'required|string',
            'location' => 'required|string|max:191',
            'email' => 'required|string|max:191|email:rfc,dns',
            'googleMap' => 'required|string',
            'twitter' => 'required|string|max:191',
            'facebook' => 'required|string|max:191',
            'instagram' => 'required|string|max:191',
        ]);

        if ($validator->fails()) {
            return back()->withInput();
        }

        $shopData = self::shopDataList();
        $shopData->phone = $request->phone;
        $shopData->workDay = $request->workDay;
        $shopData->workHour = $request->workHour;
        $shopData->closedDay = $request->closedDay;
        $shopData->location = $request->location;
        $shopData->email = $request->email;
        $shopData->googleMap = $request->googleMap;
        $shopData->twitter = $request->twitter;
        $shopData->facebook = $request->facebook;
        $shopData->instagram = $request->instagram;
        $shopData->save();

        Cache::forget('shopData');

        return redirect()->route('admin.dashboard');
    }
}
