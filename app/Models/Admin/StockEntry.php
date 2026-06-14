<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class StockEntry extends Model
{
    protected $fillable = [
        'entry_number',
        'movement_date',
        'reason',
        'created_by',
    ];

    protected $casts = [
        'movement_date' => 'date',
    ];

    public function items()
    {
        return $this->hasMany(StockEntryItem::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
