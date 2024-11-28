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
                $q->where('name', 'like', '%' . $searchTerm . '%') // 名前での検索
                ->orWhereHas('categories', function ($subQuery) use ($searchTerm) {
                    $subQuery->where(function ($enumQuery) use ($searchTerm) {
                      // enum のラベルで検索
                        foreach (CategoryEnum::cases() as $enum) {
                            if (str_contains($enum->label(), $searchTerm)) {
                                $enumQuery->orWhere('number', $enum->value);
                            }
                        }
                    });
                });
            });
        }

    $items = $query->get();

    return view('index', compact('items','page'));
}

}
