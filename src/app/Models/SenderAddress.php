<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SenderAddress extends Model
{
    use HasFactory;

    protected $fillable = ['item_id','zip_code','address','building'];

    public function item()
    {
        this->belongsTo(Item::class);
    }
}
