<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;
use URL;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if(Sentinel::check()){
            return redirect(route('admin.dashboard'));
        }
        $request->session()->put('backUrl', URL::previous());
        return view('admin.login');
    }

    public function processLogin(LoginRequest $request)
    {
        try
        {
            $remember = (bool) $request->get('remember', false);

            if (Sentinel::authenticate($request->all(), $remember))
            {
                $backUrl = $request->session()->get('backUrl', route('admin.dashboard'));
                $request->session()->forget('backUrl');
                return redirect($backUrl);
            }
            $errors = 'Login failed';
        }
        catch (NotActivatedException $e)
        {
            $errors = 'Your account has not been activated!';
        }
        catch (ThrottlingException $e)
        {
            $delay = $e->getDelay();
            $errors = "Your account is blocked within {$delay} seconds.";
        }
        return redirect()->back()->withInput()->withErrors(['err' => $errors]);
    }

    public function logout(Request $request){
        $request->session()->forget('backUrl');
        Sentinel::logout();
        return redirect(route('admin.login'));
    }
}
