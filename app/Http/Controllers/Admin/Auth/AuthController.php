<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function getLogin(Request $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
    {
        if(!Auth::user()){
            return view('admin.auth.login');
        }

        return redirect()->route('admin.dashboard');
    }

    public function postLogin(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if(Auth::user()){
            return view('admin/home');
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|max:191|email:rfc,dns',
            'password' => 'required|max:191',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.getLogin');
        }

        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.postLogin');
    }

    public function getLogout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return redirect()->route('frontend.homepage');
    }
}
