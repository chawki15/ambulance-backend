<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class StockMovementController extends Controller
{
    public function index()
    {
        return view('admin.stock-movements.index');
    }
}
