<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'photo',
        'unit',
        'quantity',
        'minimum_quantity',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'quantity' => 'integer',
        'minimum_quantity' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
