<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\CategoryEnum;
use App\Enums\ConditionEnum;
use App\Models\Item;

class SellController extends Controller
{
    public function getSell()
{
  // CategoryEnum を連想配列に変換
    $categories = CategoryEnum::cases();

  // ConditionEnum を連想配列に変換
    $conditions = ConditionEnum::cases();

        return view('sell', compact('categories','conditions'));
}

public function postSell(Request $request)
{
    //imageを変換
    if($request->hasFile('image'))
    {
        $imagePath = $request->file('image')->store('public/images');
        $imagePath = str_replace('public/','storage/',$imagePath);
    }
    else
    {
        $imagePath = null;
    }

//Itemの登録
    $item =Item::create([
        'name'=> $request->name,
        'user_id'=> Auth::id(),
        'brand'=> $request->brand,
        'price'=> $request->price,
        'condition'=> $request->condition,
        'description'=> $request->description,
        'image'=> $imagePath,
    ]);

    //categoriesの登録

    return redirect()->back()->with('result','登録しました');

}

}
