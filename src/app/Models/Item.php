<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Favorite;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'brand',
        'price',
        'condition',
        'description',
        'image'
    ];

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
