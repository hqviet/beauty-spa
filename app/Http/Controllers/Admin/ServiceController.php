<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AddServiceRequest;
use App\Http\Requests\Admin\EditServiceRequest;
use App\Models\CategoryService;
use App\Models\CategoryServiceTranslation;
use App\Models\Service;
use App\Models\ServiceTranslation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use File;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::listServices('vi')->get();

        return view('admin.pages.services.list', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate_service_translation = CategoryServiceTranslation::all();
        return view('admin.pages.services.add', compact('cate_service_translation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddServiceRequest $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try{
            if ($request->hasFile('image'))
            {
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
                $path = "assets/admin/image_service";
                $file->move($path,$name);
            }
            $data_service = [
                'slug' => str_slug($input['title']),
                'category_service_id' => $input['cat_id'],
                'price' => $input['price'],
                'image' => $name
            ];

            $service = Service::create($data_service);

            $data_service_translation = [
                'services_id' => $service->id,
                'lang' => $input['lang'],
                'name' => $input['title'],
                'short_description' => $input['short_description'],
                'description' => $input['description']
            ];
            $service_translation = ServiceTranslation::create($data_service_translation);

        }catch (\Exception $e){
            DB::rollBack();
            return back()
                ->withInput()
                ->withErrors(['err' => $e->getMessage()]);
        }
        DB::commit();
        return redirect(route('admin.service.index'))->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = Service::with('categoryService')->findOrFail($id);
        $cate_service_translation = CategoryServiceTranslation::all();

        return view('admin.pages.services.edit', compact('services', 'cate_service_translation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditServiceRequest $request, $id)
    {
        $input = $request->all();

        $service = Service::findOrFail($id);
        if($service){
            DB::beginTransaction();
            try{
                $data_service = [
                    'category_service_id' => $input['cat_id'],
                    'price' => $input['price'],
                ];
                if($input['lang'] == 'vi') {
                    $data_service['slug'] = str_slug($input['title']);
                }
                if ($request->hasFile('image'))
                {
                    if(File::exists("assets/admin/image_service/".$service->image)){
                        File::delete("assets/admin/image_service/".$service->image);
                    }

                    $file = $request->file('image');
                    $name = time().$file->getClientOriginalName();

                    $path = "assets/admin/image_service";
                    $file->move($path,$name);

                    $data_service['image'] = $name;
                } else {
                    unset($input['image']);
                }

                $service->update($data_service);

                $data_service_translation = [
                    'services_id' => $service->id,
                    'lang' => $input['lang'],
                    'name' => $input['title'],
                    'short_description' => $input['short_description'],
                    'description' => $input['description']
                ];

                if($input['lang'] == 'vi')
                {
                    $service_translation = ServiceTranslation::where('services_id',$id)->first()->update($data_service_translation);
                } else {
                    $service_translation = ServiceTranslation::updateOrCreate(
                        ['services_id' => $service->id, 'lang' => 'en'],
                        $data_service_translation
                    );
                }
            }catch (\Exception $e){
                DB::rollBack();
                return back()
                    ->withInput()
                    ->with('err', $e->getMessage());
            }
            DB::commit();
        }
        return redirect(route('admin.service.index'))
            ->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function delete(Request $request)
    {
        $id = $request->input('id', 0);
        $services = Service::find($id);

        DB::beginTransaction();
        try{
            if(File::exists("assets/admin/image_service/".$services->image)){
                File::delete("assets/admin/image_service/".$services->image);
            }

            if($services){
                $services->ServiceTranslation()->delete();
                $services->delete();
            }
            $services->ServiceTranslation()->delete();
        }catch (\Exception $e){
            DB::rollBack();
            return back()
                ->withInput()
                ->withErrors(['err' => $e->getMessage()]);
        }
        DB::commit();
        return redirect(route('admin.service.index'))
            ->with('success', 'Deleted successfully!');
    }
}
