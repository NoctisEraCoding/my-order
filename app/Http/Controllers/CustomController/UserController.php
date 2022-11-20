<?php

namespace App\Http\Controllers\CustomController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function adminUserList(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::all();

        return view('admin.users.usersList')->with('users', $users);
    }

    public function adminModifyUser(User $user = null): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.users.modifyUser')
            ->with('user', $user);
    }

    public function adminSaveModifyUser(Request $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'password' => 'nullable|string|max:191',
            'email' => 'required|string|email:rfc,dns',
            'admin' => [
                'required',
                Rule::in(['true', 'false']),
            ]
        ]);

        if ($validator->fails()) {
            return back()->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if($request->has('password') && !is_null($request->password)){
            $user->password = Hash::make($request->password);
        }

        if($request->admin == "true"){
            $user->admin = true;
        }
        else {
            $user->admin = false;
        }

        $user->save();

        return redirect()->route('admin.userList');
    }
}
