<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function getPurchase($item_id)
    {
        $item = Item::find($item_id)->first();
        $profile = Profile::where('user_id', Auth::id())->first();
        return view('purchase',compact('item','profile'));
    }
}
