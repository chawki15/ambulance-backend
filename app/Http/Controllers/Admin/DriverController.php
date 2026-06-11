<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DriverController extends Controller
{
    public function index()
    {
        return view('admin.drivers.index');
    }
}
