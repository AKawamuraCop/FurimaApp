<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Favorite;
use App\Models\SenderAddress;
use App\Enums\ConditionEnum;

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

    protected $casts =[
        'condition' => ConditionEnum::class,
    ];

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function sale()
    {
        return $this->hasOne(Sale::class, 'item_id');
    }

    public function senderAddress()
    {
        return $this->hasOne(SenderAddress::class);
    }

}
