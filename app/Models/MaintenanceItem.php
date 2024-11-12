<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaintenanceItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function items(): BelongsTo
    {
        return $this->BelongsTo(Item::class, 'item_id');
    }

    public function maintenance(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'maintenance_id');
    }
}
