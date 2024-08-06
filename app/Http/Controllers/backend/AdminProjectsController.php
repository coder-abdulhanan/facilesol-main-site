<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Projects;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class AdminProjectsController extends Controller
{
    public function index()
    {
        if(session()->has('email')){
            return view('backend.projects', ['project'=>Projects::get()]);
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function addProject()
    {
        if(session()->has('email')){
            return view('backend.project-add');
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function submitProjectRecord(Request $request)
    {
        // dd($request->all());
        if(session()->has('email')){
            $request->validate(
                [
                    'title' => 'required|min:3',
                    'details' => 'required|min:10',
                    'link' => 'required|min:3',
                    'category' => 'required|min:3',
                    'technology' => 'required|min:3',
                    'client' => 'required|min:3',
                    'image' => 'required|mimes:jpeg,jpg,png|max:10000'
                ]);
            $PROJECT_STATUS = 1;
            $ImageName = 'fs_team_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('backend/images/projects'), $ImageName);
            // dd($ImageName);
            $projects = new Projects();
            $projects->title = $request->title;
            $projects->details = $request->details;
            $projects->link = $request->link;
            $projects->category = $request->category;
            $projects->technology = $request->technology;
            $projects->client = $request->client;
            $projects->image = $ImageName;
            $projects->status = $PROJECT_STATUS;
            $projects->save();
            return back()->withSuccess('Project Record Added Successfully');
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function editProject($id)
    {
            // dd($id);
        if(session()->has('email')){
            $projects = Projects::where('id', $id)->first();
            return view('backend.project-edit', ['project' => $projects]);
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function updateProject(Request $request, $id)
    {
        if(session()->has('email')){
            $request->validate(
                [
                    'title' => 'required|min:3',
                    'details' => 'required|min:10',
                    'link' => 'required|min:3',
                    'category' => 'required|min:3',
                    'technology' => 'required|min:3',
                    'client' => 'required|min:3',
                    'image' => 'nullable|mimes:jpeg,jpg,png|max:10000'
                ]
                );

            $team = Projects::where('id', $id)->first();
            $PROJECT_STATUS = 1;
            if(isset($request->image))
            {
                $ImageName = 'fs_team_' . time() . '.' . $request->image->extension();
                $request->image->move(public_path('backend/images/projects'), $ImageName);
                $team->image = $ImageName;
            }
            $team->title = $request->title;
            $team->details = $request->details;
            $team->link = $request->link;
            $team->category = $request->category;
            $team->technology = $request->technology;
            $team->client = $request->client;
            $team->status = $PROJECT_STATUS;
            $team->save();
            return back()->withSuccess('Project Record Updated Successfully');
        } else {
            return redirect()->route('admin.login');
        }
    }


    public function deleteProject($id)
    {
        if(session()->has('email')){
            $project = Projects::where('id', $id)->first();
            $project->delete();
            return back()->withSuccess('Member Record Deleted Successfully');
        } else {
            return redirect()->route('admin.login');
        }
    }

}
