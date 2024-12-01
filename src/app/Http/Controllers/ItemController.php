<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use App\Enums\CategoryEnum;

class ItemController extends Controller
{

    public function index(Request $request)
    {
        $tab = $request->query('tab'); // クエリパラメータを取得

        if ($tab === 'mylist') {
            // ログインしていない場合はリダイレクト
            if (!Auth::check()) {
                return redirect('/')->with('result','ログインしてください');
            }

            $items = Auth::user()->favorites()->get();
        } else {
            $items = Item::all(); 
        }

        return view('index', compact('items', 'tab'));
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

        $comments = Comment::where('item_id', $item_id)
                    ->orderBy('created_at', 'desc')
                    ->with('user') // User情報を一緒に取得
                    ->get();


        return view('detail',compact('item','categories','comments'));

    }

    public function search(Request $request)
    {
        // $pageの値を取得
        $page = $request->get('page', null);

        // ベースのクエリを設定
        $query = Item::with('categories');

        // $page === 'mylist' の場合はfavoritesに登録されたitemだけを絞り込む
        if ($page === 'mylist') {
            $query->whereHas('favorites', function ($q) {
                $q->where('user_id', auth()->id()); // ログインユーザーで絞り込み
            });
        }

        // 商品名での検索
        if (!empty($request->search)) {
            $searchTerm = $request->search;

            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%');// 名前での検索
            });
        }

    $items = $query->get();

    return view('index', compact('items','page'));
}

}
