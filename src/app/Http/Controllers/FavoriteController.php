<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function create($item_id)
    {
         Favorite::create([
                'user_id' => Auth::id(),
                'item_id'=> $item_id,]);

        return redirect()->back();
    }

    public function delete($item_id)
    {
        Favorite::where('user_id', Auth::id())->where('item_id', $item_id)->delete();
        return redirect()->back();;
    }
}
