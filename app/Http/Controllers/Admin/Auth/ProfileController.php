<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Requests\Admin\ChangePasswordProfile;
use App\Http\Requests\Admin\UpdateProfileRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('admin.pages.profile.profile');
    }

    public function profileUpdate(UpdateProfileRequest $request)
    {
        $user = Sentinel::getUser();
        $input = $request->all();
        Sentinel::update($user, $input);
        return redirect(route('admin.profile'))->with('success', 'Change information successful!');
    }

    public function changePassword(ChangePasswordProfile $request)
    {   $user = Sentinel::getUser();
        $hash = Sentinel::getHasher();

        $password = $request->password;
        $new_password = $request->new_password;

        if(!$hash->check($password, $user->password)){
            return redirect()->back()->withErrors(['password' => 'Current password is incorrect']);
        }

        Sentinel::update($user, array('password' => $new_password));
        return redirect(route('admin.profile'))->with('success', 'Change password successfully!');
    }

}
