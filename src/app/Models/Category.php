<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\CategoryEnum;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'number'
    ];

    protected $casts = [
        'number' => CategoryEnum::class,
    ];
}
