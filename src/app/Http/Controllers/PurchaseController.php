<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Profile;
use App\Models\User;
use App\Models\SenderAddress;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function getPurchase($item_id)
    {
        $item = Item::with('senderAddress')->where('id', $item_id)->first();
        $profile = Profile::where('user_id', Auth::id())->first();
        return view('purchase',compact('item','profile'));
    }

    public function getAddress($item_id){
        $item_id = $item_id;
        $address = SenderAddress::where('item_id', $item_id)->first();
        if(empty($address))
        {
            $address = Profile::where('user_id', Auth::id())->first();
        }

        return view('address',compact('item_id','address'));
    }

    public function postAddress(Request $request){
        $item_id = $request->item_id;
        $address = SenderAddress::where('item_id', $request->item_id)->first();

        if($address){

            $address->update([
                'item_id' => $request->item_id,
                'zip_code' => $request->zip_code,
                'address' => $request->address,
                'building' => $request->building
            ]);
        }
        else
        {
            SenderAddress::create([
                'item_id' => $request->item_id,
                'zip_code' => $request->zip_code,
                'address' => $request->address,
                'building' => $request->building
            ]);
        }

        return redirect()->route('purchase.address',['item_id'=> $item_id])->with('result','更新しました');
    }
}
