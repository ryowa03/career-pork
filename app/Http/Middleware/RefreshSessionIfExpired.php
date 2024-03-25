<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Session;

Session::flush();
Session::regenerate();

class RefreshSessionIfExpired extends StartSession
{
    public function handle($request, Closure $next)
    {
        if (Session::has('lastActivity')) {
            $lastActivity = Session::get('lastActivity');
            $sessionLifetime = config('session.lifetime') * 60;

            if (time() - $lastActivity > $sessionLifetime) {
                // セッションの有効期限が切れた場合はセッションを再生成する
                $request->session()->regenerate();
            }
        }

        // 最終アクティビティを更新
        Session::put('lastActivity', time());

        return parent::handle($request, $next);
    }
}