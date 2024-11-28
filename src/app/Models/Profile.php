<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['zip_code', 'address', 'building','image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
