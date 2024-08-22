<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $categories = Projects::select('category')->distinct()->get();
        $projects = Projects::all();
        return view('frontend.projects',  compact('categories', 'projects'));
    }
}
