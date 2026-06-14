<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    public function index()
    {
        return view('admin.stock.index');
    }

    public function stockIn()
    {
        return view('admin.stock.index');
    }

    public function createStockIn()
    {
        return view('admin.stock.create');
    }


    public function storeStockIn(Request $request)
    {
        $request->validate([
            'movement_date' => 'required|date',
            'items' => 'required|array|min:1',
            'items.*.medicine_name' => 'required|string|max:255',
            'items.*.category' => 'required|string|max:255',
            'items.*.quantity' => 'required|integer|min:1',
            'reason' => 'nullable|string|max:255',
        ]);

        // هنا تقوم بحفظ البيانات في قاعدة البيانات

        return response()->json([
            'success' => true,
            'message' => 'Entrée de stock enregistrée avec succès.'
        ]);
    }
}
