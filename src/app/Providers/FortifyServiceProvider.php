<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::loginView(function () {
            return view('auth.login');
        });

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;
            return Limit::perMinute(10)->by($email . $request->ip());
        });

        // ログインロジック
         Fortify::authenticateUsing(function (LoginRequest $request) {
         // 入力値
             $login = $request->input('email'); // ユーザー名/メールアドレスのフィールド名
             $password = $request->input('password');


             // ユーザー名またはメールアドレスで検索
             $user = User::where('email', $login)
                 ->orWhere('name', $login)
                 ->first();

        //     // ユーザーが存在し、パスワードが一致する場合
             if ($user && Hash::check($password, $user->password)) {
                 Auth::login($user);
                 return $user; // ログイン成功
             }

             session()->flash('error', 'ログインに失敗しました。ユーザー名またはパスワードが間違っている可能性があります。');
             return null;
         });
    }
}
