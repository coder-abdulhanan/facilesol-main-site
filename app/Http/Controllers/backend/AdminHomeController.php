<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Admins;
use App\Models\backend\FAQs;
use App\Models\backend\Projects;
use App\Models\backend\Team;
use Illuminate\Support\Facades\Hash;

class AdminHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $TotalAdmins = Admins::count(); //2
        $TotalTeam = Team::count();  // 1
        $TotalFAQs = FAQs::count(); // 6
        $TotalProjects = Projects::count(); // 1
        return view('backend.index', compact('TotalAdmins', 'TotalTeam', 'TotalFAQs', 'TotalProjects'));
    }


    public function registerAdmin()
    {
        // $url = route('admin.create');
        // $data = compact('url');
        // return view('backend.admin-add')->with($data);

        return view('backend.admin-add');
    }


    public function submitAdminRecord(Request $request)
    {
        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'confirm_password' => 'required',
                'contact' => 'required'
            ]
            );
        $admin = new Admins();
        $admin->first_name = $request['first_name'];
        $admin->last_name = $request['last_name'];
        $admin->email = $request['email'];
        $admin->contact = $request['contact'];
        $admin->password = $request['password'];
        $admin->password = Hash::make($request['password']);
        // $admin->password = md5($request['password']);
        $admin->status = 1;
        $admin->save();
        // return redirect('/admin/admins-list');
        return redirect()->route('admin.show');
    }


    public function showAdminRecord()
    {

        $admins = Admins::all();

        // Calling the helper function for testing data
        // testData($admins);

        //     echo "<pre>";
        //     print_r($admins->toArray()); //toArry runs only when we have some data in DB
        //    echo  "</pre>";
        //     die;

        $data = compact('admins');
        return view('backend/admins-list')->with($data);

    }

    public function deleteAdminRecord(string $id)
    {
        $data  = Admins::find($id);
        if(!is_null($data)){
            $data->delete();
        }
        $data = compact('admins');
        return view('backend/admins-list')->with($data);
    }

    public function editAdminRecord($id)
    {
        // dd($id);
        $data = Admins::where('id', $id)->first();
        return view('backend.admin-edit', ['admin' => $data]);

        // $data  = Admins::find($id);
        // if(is_null($data)){
        //     return view('backend.admins-list');
        // } else {
        //     $url = url('/admin/update') . "/" . $id;
        //     $data = compact('admins', 'url');
        //     return view('backend.admin-add')->with($data);
        // }

    }

    public function updateAdminRecord(Request $request, $id){
        $request->validate(
            [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'contact' => 'required'
            ]
            );

        $admin = Admins::where('id', $id)->first();
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->contact = $request->contact;
        $admin->save();
        return back()->withSuccess('Member Record Updated Successfully');

    }

}
