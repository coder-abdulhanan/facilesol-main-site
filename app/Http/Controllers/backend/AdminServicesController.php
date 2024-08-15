<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
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
        return view('backend.service-add', ['FullName' => $FullName]);
    }



}
