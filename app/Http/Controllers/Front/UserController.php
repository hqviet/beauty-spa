<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\Front\EditInfoRequest;
use App\Http\Requests\Front\LoginRequest;
use App\Http\Requests\Front\RegisterRequest;
use App\Http\Requests\Front\SetScheduleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;
use DB;
use URL;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use App\Models\Service;
use App\Models\Schedule;
use Illuminate\Support\Facades\Mail;
use App\Mail\SetSchedule;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if (Sentinel::check()) {
            return redirect(route('front.index'));
        }
        $request->session()->put('backUrl', URL::previous());
        return view('frontend.users.login');
    }

    public function processLogin(LoginRequest $request)
    {
        try {
            $data = [
                'email' => $request->emailLogin,
                'password' => $request->passwordLogin
            ];
            if (Sentinel::authenticate($data)) {
                $backUrl = $request->session()->get('backUrl', route('front.index'));
                $request->session()->forget('backUrl');
                return redirect($backUrl);
            }
            $errors = trans('front.login_fail');
        } catch (NotActivatedException $e) {
            $errors = trans('front.not_active');
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            $errors = trans('front.block', ['delay' => $delay]);
        }

        return redirect()->back()->withInput()->withErrors(['err' => $errors]);
    }

    public function processRegister(RegisterRequest $request)
    {
        $data = $request->all();

        $data['permissions'] = [
            'administrator' => false,
            'directorate' => false,
        ];
        DB::beginTransaction();
        try {
            $user = Sentinel::registerAndActivate($data);
            $role = Sentinel::findRoleBySlug('user');
            $role->users()->attach($user);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('err', $e->getMessage());
        }
        DB::commit();
        Sentinel::authenticate([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->route('front.index')->with('signup_success', trans('front.register_success'));
    }

    public function logout(Request $request)
    {
        $request->session()->forget('backUrl');
        Sentinel::logout();
        return redirect(route('front.login'));
    }

    public function setSchedule(SetScheduleRequest $request)
    {
        $data = $request->all();
        $service = Service::findOrFail($data['services_id']);
        if ($service) {
            DB::beginTransaction();
            try {
                $schedule = Schedule::create($data);
                Mail::to($request->email)->send(new SetSchedule($schedule, $service));
            } catch (\Exception $e) {
                DB::rollBack();
                return back()
                    ->withInput()->withErrors(['err' => $e->getMessage()]);
            }
            DB::commit();
        }
        return redirect()->back()->with('success', trans('front.schedule_success'));
    }

    public function getInfoUser()
    {
        $user = Sentinel::getUser();
        $schedules = Schedule::where('email','=',$user->email)->get();
        return view('frontend.users.profile', compact('user', 'schedules'));
    }

    public function postInfoUser(EditInfoRequest $request)
    {
        $user = Sentinel::getUser();
        $request->request->remove('email');
        if (!$request->password) {
            $request->request->remove('password');
        }
        $data = $request->all();

        $user = Sentinel::update($user, $data);

        return redirect()->back()->with('success', trans('front.edit_info_success'));
    }
}
