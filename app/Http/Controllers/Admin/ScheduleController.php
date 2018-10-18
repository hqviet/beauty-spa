<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Front\SetScheduleRequest;
use App\Http\Requests\Front\UpdateScheduleRequest;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;
use App\Mail\SetSchedule;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();
        return view('admin.pages.schedule.list', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::listServices('vi')->get();
        return view('admin.pages.schedule.add', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SetScheduleRequest $request)
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = Service::listServices('vi')->get();
        $schedule = Schedule::with('service')->findOrFail($id);
        return view('admin.pages.schedule.edit', compact('services','schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScheduleRequest $request, $id)
    {
        $data = $request->all();
        $schedule = Schedule::findOrFail($id);
        $service = Service::findOrFail($data['services_id']);
        if ($schedule) {
            DB::beginTransaction();
            try {
                $schedule->update($data);
                Mail::to($request->email)->send(new SetSchedule($schedule, $service));
            } catch (\Exception $e) {
                DB::rollBack();
                return back()
                    ->withInput()->withErrors(['err' => $e->getMessage()]);
            }
            DB::commit();
        }
        return redirect()->back()->with('success', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->input('id', 0);
        $schedule = Schedule::find($id);

        DB::beginTransaction();
        try{
            $schedule->delete();
        }catch (\Exception $e){
            DB::rollBack();
            return back()
                ->withInput()
                ->withErrors(['err' => $e->getMessage()]);
        }
        DB::commit();
        return redirect(route('admin.schedule.index'))
            ->with('success', 'Deleted successfully!');
    }
}
