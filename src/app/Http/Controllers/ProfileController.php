<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfile(Request $request){
        $profile = Profile::with('user')
            ->where('user_id', Auth::id())
            ->first();

        return view('profile',compact('profile'));
    }

    public function postProfile(Request $request)
    {
        $profile = Profile::where('user_id',Auth::id())->first();
        //ユーザー名更新
        $user = User::find(Auth::id());
        $user->update([
            'name' => $request-> user_name,
        ]);

        //画像のパス
        if ($request->hasFile('image'))
        {
            $imagePath = $request->file('image')->store('public/images');

            $imagePath = str_replace('public/', 'storage/', $imagePath);
        }
        else
        {
            $imagePath = null;
        }

        //プロフィールの登録と更新
        if($profile !== null)
        {    //update
            $profile->update([
                'user_id'=> Auth::id(),
                'zip_code' => $request->zip_code,
                'address' => $request->address,
                'building' => $request->building,
                'image' => $imagePath
            ]);
        }
        else
        {
            //create
            Profile::create([
                'user_id'=> Auth::id(),
                'zip_code' => $request->zip_code,
                'address' => $request->address,
                'building' => $request->building,
                'image' => $imagePath
            ]);
        }

    return redirect('/');
}

}
