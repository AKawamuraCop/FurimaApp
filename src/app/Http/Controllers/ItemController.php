<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Sale;
use App\Enums\CategoryEnum;

class ItemController extends Controller
{

    public function index(Request $request)
    {
        $tab = $request->query('tab'); // クエリパラメータを取得

        if ($tab === 'mylist') {
            // ログインしていない場合はリダイレクト
            if (Auth::check()) {
                $items = Auth::user()->favorites()->with('sale')->get();
            }
            else{
                $item ="";
            }

        }
        else
        {
            $items = Item::with('sale')
                ->where('user_id', '!=', Auth::id())
                ->get();
        }

        return view('index', compact('items', 'tab'));
    }


    public function getDetail($item_id)
    {

        $loginUser = auth()->id();
        $item = Item::with('favorites','sale')
                ->findOrFail($item_id);


        $categories = Category::where('item_id', $item_id)
        ->get();

        $comments = Comment::where('item_id', $item_id)
                    ->orderBy('created_at', 'desc')
                    ->with('user') // User情報を一緒に取得
                    ->get();


        return view('detail',compact('item','categories','comments'));

    }

    public function search(Request $request)
    {
       // $pageの値を取得
        $tab = $request->get('tab', null);

        //検索を取得
        $searchTerm = $request->search;

        // ベースのクエリを設定
        $query = Item::query();

        // $tab === 'mylist' の場合はfavoritesに登録されたitemだけを絞り込む
        if ($tab === 'mylist') {
            $query->whereHas('favorites', function ($q) use($searchTerm){
                $q->where('user_id', auth()->id())// ログインユーザーで絞り込み
                  ->where('name', 'like', '%' . $searchTerm . '%'); // 名前での検索
            });
        }

        // 商品名での検索
        if (!empty($request->search)) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%');// 名前での検索
            });
        }

        $items = $query->get();

        return view('index', compact('items','tab'));
    }

}
