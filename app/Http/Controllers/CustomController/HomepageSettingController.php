<?php

namespace App\Http\Controllers\CustomController;

use App\Http\Controllers\Controller;
use App\Models\AboutpageSetting;
use App\Models\GallerySetting;
use App\Models\HomepageSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class HomepageSettingController extends Controller
{
    public static function homepageSettingList(): \Illuminate\Database\Eloquent\Collection
    {
        return HomepageSetting::get();
    }

    public static function gallerySettingList(): \Illuminate\Database\Eloquent\Collection
    {
        return GallerySetting::all();
    }

    /**
     * Controller Homepage Setting for Dashboard
     */
    public function adminHomepageSettingList(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $settings = $this->homepageSettingList();
        $about = AboutpageSetting::first();
        $gallery = $this->gallerySettingList();

        return view('admin.homepageSetting.homepageSettingList')
            ->with('settings', $settings)
            ->with('about', $about)
            ->with('gallery', $gallery);
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

    /**
     * Controller About Setting for Dashboard
     */
    public function adminModifyAboutpageSetting(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $about = AboutpageSetting::first();
        return view('admin.homepageSetting.modifyAboutpageSetting')
            ->with('about', $about);
    }

    public function adminSaveModifyAboutpageSetting(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:191',
            'description' => 'required|string',
            'image' => 'image|mimes:jpg,bmp,png,jpeg,webp',
            'video' => 'required|string|max:191'
        ]);

        if ($validator->fails()) {
            return back()->withInput();
        }

        $about = AboutpageSetting::first();
        $about->title = $request->title;
        $about->description = $request->description;
        $about->video = $request->video;

        if($request->has('image')) {
            $about->image = $request->image->storeAs('aboutpageSlider', $about->id . '.' . $request->image->extension(), 'public');
        }

        $about->save();

        return redirect()->route('admin.homepageSettingList');
    }

    /**
     * Controller Gallery Setting for Dashboard
    */
    public function adminCreateGallerySetting(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.homepageSetting.createGallerySetting');
    }

    public function adminSaveCreateGallerySetting(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,bmp,png,jpeg,webp',
            'show' => [
                'required',
                Rule::in(['true', 'false']),
            ]
        ]);

        if ($validator->fails()) {
            return back()->withInput();
        }

        $gallery = new GallerySetting;

        if($request->show == "true"){
            $gallery->show = true;
        }
        else {
            $gallery->show = false;
        }

        $gallery->save();

        if($request->has('image')) {
            $gallery->image = $request->image->storeAs('galleryImage', $gallery->id . '.' . $request->image->extension(), 'public');
        }

        $gallery->save();

        return redirect()->route('admin.homepageSettingList');
    }

    public function adminModifyGallerySetting(GallerySetting $gallery = null): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.homepageSetting.modifyGallerySetting')
            ->with('gallery', $gallery);
    }

    public function adminSaveModifyGallerySetting(Request $request, GallerySetting $gallery): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpg,bmp,png,jpeg,webp',
            'show' => [
                'required',
                Rule::in(['true', 'false']),
            ]
        ]);

        if ($validator->fails()) {
            return back()->withInput();
        }

        if($request->show == "true"){
            $gallery->show = true;
        }
        else {
            $gallery->show = false;
        }

        if($request->has('image')) {
            $gallery->image = $request->image->storeAs('galleryImage', $gallery->id . '.' . $request->image->extension(), 'public');
        }

        $gallery->save();

        return redirect()->route('admin.homepageSettingList');
    }

    public function adminDeleteGallerySetting(GallerySetting $gallery = null): \Illuminate\Http\RedirectResponse
    {
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();

        return redirect()->route('admin.homepageSettingList');
    }
}
