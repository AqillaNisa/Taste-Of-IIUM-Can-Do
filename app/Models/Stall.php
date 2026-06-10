<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stall extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mahallah',
        'opening_hours',
        'food_type',
        'menu_items',
        'image_path',
    ];

    public function foods(): HasMany
    {
        return $this->hasMany(Food::class);
    }
}
