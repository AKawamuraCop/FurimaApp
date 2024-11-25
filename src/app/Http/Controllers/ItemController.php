<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;
use App\Models\Category;

class ItemController extends Controller
{

    public function index(Request $request)
    {
        $page = $request->query('page'); // クエリパラメータを取得

        if ($page === 'mylist') {
            // ログインしていない場合はリダイレクト
            if (!Auth::check()) {
                return redirect('/')->with('result','ログインしてください');
            }

            // マイリスト用のデータ取得（例: ログインユーザーのお気に入り）
            $items = Auth::user()->favorites()->get();
        } else {
            // おすすめ用のデータ取得（例: 全商品の一覧やランダムなアイテム）
            $items = Item::all(); // 適宜クエリを変更してください
        }

        return view('index', compact('items', 'page'));
    }


    public function getDetail($item_id)
    {
        // $item = Item::find($item_id);
        // $categories = Category::where('item_id', $item_id)
        // ->get();

        $loginUser = auth()->id();
        $item = Item::with(['favorites' => function ($query) {
            $query->where('user_id', auth()->id());
        }])->find($item_id);


        $categories = Category::where('item_id', $item_id)
        ->get();



        return view('detail',compact('item','categories'));

    }
}
