<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Item;
use App\Models\Sale;
use App\Models\Profile;

class MypageController extends Controller
{
    public function getMypage(Request $request)
    {
        $tab = $request->tab;
        $profile = Profile::where('user_id', Auth::id())->first();

        if($tab == 'sell')
        {
            $items = Item::where('user_id', Auth::id())->get();

        }
        else{
            $loggedInUserId = Auth::id();

            $items = Item::whereHas('sale', function ($query) use ($loggedInUserId) {
                    $query->where('user_id', $targetUserId);
                    })->get();
        }
        return view('/mypage', compact('profile','items','tab'));
    }
}
