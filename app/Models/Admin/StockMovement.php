<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    protected $fillable = [
        'medicine_id',
        'stock_entry_id',
        'type',
        'quantity',
        'reason',
        'created_by',
    ];

    protected $casts = [
        'quantity' => 'integer',
    ];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }

    public function stockEntry()
    {
        return $this->belongsTo(StockEntry::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
