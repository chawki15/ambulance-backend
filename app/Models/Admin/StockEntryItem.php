<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class StockEntryItem extends Model
{
    protected $fillable = [
        'stock_entry_id',
        'medicine_id',
        'quantity',
    ];

    protected $casts = [
        'quantity' => 'integer',
    ];

    public function stockEntry()
    {
        return $this->belongsTo(StockEntry::class);
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
