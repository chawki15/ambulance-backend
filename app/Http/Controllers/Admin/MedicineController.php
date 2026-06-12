<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class MedicineController extends Controller
{
    public function index()
    {
        return view('admin.medicines.index');
    }

    public function create()
    {
        return view('admin.medicines.create');
    }
}
