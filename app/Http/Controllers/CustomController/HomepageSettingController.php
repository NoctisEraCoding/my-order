<?php

namespace App\Http\Controllers\CustomController;

use App\Http\Controllers\Controller;
use App\Models\HomepageSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class HomepageSettingController extends Controller
{
    public static function homepageSettingList(): \Illuminate\Database\Eloquent\Collection
    {
        return HomepageSetting::get();
    }

    /**
     * Controller Homepage Setting for Dashboard
     */
    public function adminHomepageSettingList(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $settings = $this->homepageSettingList();

        return view('admin.homepageSetting.homepageSettingList')->with('settings', $settings);
    }

    public function adminModifyHomepageSetting(HomepageSetting $setting = null): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.homepageSetting.modifyHomepageSetting')
            ->with('setting', $setting);
    }

    public function adminSaveModifyHomepageSetting(Request $request, HomepageSetting $setting): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:191',
            'description' => 'required|string',
            'image' => 'image|mimes:jpg,bmp,png,jpeg,webp',
            'show' => [
                'required',
                Rule::in(['true', 'false']),
            ]
        ]);

        if ($validator->fails()) {
            return back()->withInput();
        }

        $setting->title = $request->title;
        $setting->description = $request->description;

        if($request->has('image')) {
            $setting->image = $request->image->storeAs('homepageSlider', $setting->id . '.' . $request->image->extension(), 'public');
        }

        if($request->show == "true"){
            $setting->show = true;
        }
        else {
            $setting->show = false;
        }

        $setting->save();

        return redirect()->route('admin.homepageSettingList');
    }
}
