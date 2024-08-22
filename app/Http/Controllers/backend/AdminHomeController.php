<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\Blogs;
use App\Models\Contact;
use App\Models\FAQs;
use App\Models\Projects;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class AdminHomeController extends Controller
{

    public function index()
    {
        // if(session()->exists('email')){
        //     dd('Yes');
        // } else {
        //     dd('No Session Exists');
        // }

            $FullName = session('first_name') . " " . session('last_name');
            $TotalAdmins = Admins::count();
            $TotalTeam = Team::count();
            $TotalFAQs = FAQs::count();
            $TotalPosts = Blogs::count();
            $TotalContacts = Contact::count();
            $TotalProjects = Projects::count();
            $AppProjects = Projects::where('category', 'Mobile App Development')->count();
            $WebProjects = Projects::where('category', 'Web App Development')->count();
            $UIUXProjects = Projects::where('category', 'UI/UX')->count();
            $AIMLProjects = Projects::where('category', 'AI/ML')->count();
            return view('backend.index', compact('FullName','TotalAdmins', 'TotalTeam', 'TotalFAQs', 'TotalProjects', 'AppProjects', 'TotalPosts', 'TotalContacts', 'WebProjects', 'UIUXProjects', 'AIMLProjects'));

    }

    public function registerAdmin()
    {
        $FullName = session('first_name') . " " . session('last_name');
        return view('backend.admin-add', ['FullName' => $FullName]);

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
                ]);
            $admin = new Admins();
            $admin->first_name = $request->first_name;
            $admin->last_name = $request->last_name;
            $admin->email = $request->email;
            $admin->contact = $request->contact;
            $admin->password = $request->password;
            $admin->password = Hash::make($request->password);
            // $admin->password = md5($request->password);
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
            $FullName = session('first_name') . " " . session('last_name');
            $Data = compact('admins', 'FullName');
            return view('backend/admins-list')->with($Data);
    }

    public function deleteAdminRecord($id)
    {
            $admin = Admins::where('id', $id)->first();
            $admin->delete();
            return back()->withSuccess('Admin Deleted Successfully');
    }

    public function editAdminRecord($id)
    {
        // dd($id->toArray());
        $FullName = session('first_name') . " " . session('last_name');
        $Data = Admins::where('id', $id)->first();
        return view('backend.admin-edit', ['admin' => $Data, 'FullName' => $FullName]);
    }

    public function updateAdminRecord(Request $request, $id){
            $request->validate(
                [
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'contact' => 'required'
                ]);
            $admin = Admins::where('id', $id)->first();
            $admin->first_name = $request->first_name;
            $admin->last_name = $request->last_name;
            $admin->contact = $request->contact;
            $admin->save();
            return back()->withSuccess('Admin Record Updated Successfully');

    }
}
