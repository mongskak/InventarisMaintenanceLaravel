<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Products extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function maintenance()
    {
        return $this->hasMany(Maintenance::class, 'product_id');
    }
}
