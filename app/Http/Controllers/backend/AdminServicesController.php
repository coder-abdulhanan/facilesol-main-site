<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminServicesController extends Controller
{
    public function index()
    {

        $FullName = session('first_name') . " " . session('last_name');
        $services = DB::table('services')
        ->join('services_category', 'services.category_id', '=', 'services_category.id')
        ->select('services.*', 'services_category.title as category_name')
        ->get();
        return view('backend.services', ['service' => $services, 'FullName' => $FullName]);
    }

    public function addService()
    {
        $FullName = session('first_name') . " " . session('last_name');
        $ServiceCategories = ServiceCategory::get();
        return view('backend.service-add', ['FullName' => $FullName, 'categories' => $ServiceCategories]);
    }
    public function submitRecord(Request $request)
    {
        // dd($request->all());
        $request->validate(
        [
            'title' => 'required|min:3',
            'details' => 'required|min:10',
            'category' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,svg|max:10000'
        ]);
        $SERVICE_STATUS = 1;
        $ImageName = 'fs_service_' . time() . '.' . $request->image->extension();
        $request->image->move(public_path('backend/images/services'), $ImageName);
        // dd($ImageName);
        $service = new Services();
        $service->title = $request->title;
        $service->details = $request->details;
        $service->thumbnail = $ImageName;
        $service->status = $SERVICE_STATUS;
        $service->save();
        return back()->withSuccess('Project Record Added Successfully');
    }
    public function editRecord($id)
    {
        // dd($id);
        $FullName = session('first_name') . " " . session('last_name');
        $service = Services::where('id', $id)->first();
        return view('backend.service-edit', ['service' => $service, 'FullName' => $FullName]);
    }

    public function updateRecord(Request $request, $id)
    {
        $request->validate(
        [
            'title' => 'required|min:3',
            'details' => 'required|min:10',
            'thumbnail' => 'nullable|mimes:jpeg,jpg,png,svg|max:10000'
        ]
        );

        $service = Services::where('id', $id)->first();
        if(isset($request->thumbnail))
        {
            $ImageName = 'fs_service_' . time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('backend/images/services'), $ImageName);
            $service->thumbnail = $ImageName;
        }
        $service->title = $request->title;
        $service->details = $request->details;
        $service->save();
        return back()->withSuccess('Service Record Updated Successfully');
    }

    public function deleteRecord($id)
    {
        $service = Services::where('id', $id)->first();
        $service->delete();
        return back()->withSuccess('Service Record Deleted Successfully');
    }
}
