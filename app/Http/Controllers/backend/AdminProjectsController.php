<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use Illuminate\Http\Request;

class AdminProjectsController extends Controller
{
    public function index()
    {
        $FullName = session('first_name') . " " . session('last_name');
        $Projects = Projects::get();
        return view('backend.projects', ['project' => $Projects, 'FullName' => $FullName]);

    }

    public function addProject()
    {
        $FullName = session('first_name') . " " . session('last_name');
        return view('backend.project-add', ['FullName' => $FullName]);
    }

    public function submitProjectRecord(Request $request)
    {
        // dd($request->all());
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
    }

    public function editProject($id)
    {
        // dd($id);
        $FullName = session('first_name') . " " . session('last_name');
        $projects = Projects::where('id', $id)->first();
        return view('backend.project-edit', ['project' => $projects, 'FullName' => $FullName]);
    }

    public function updateProject(Request $request, $id)
    {
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
    }

    public function deleteProject($id)
    {
        $project = Projects::where('id', $id)->first();
        $project->delete();
        return back()->withSuccess('Member Record Deleted Successfully');
    }

}
