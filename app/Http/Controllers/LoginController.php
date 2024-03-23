<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


  /**
     * 認証の試行を処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([ // 入力内容のチェック
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        // 以下、adminということは管理者情報
        if (Auth::guard('admin')->attempt($credentials)) { // ログイン試行credentialsがパスワードなど
            if ($request->user('admin')?->admin_level > 0) { // 管理権限レベルが0でないか
                $request->session()->regenerate(); // セッション更新

                return redirect()->intended('admin/dashboard'); // ダッシュボードへ
            } else {
                Auth::guard('admin')->logout(); // if文でログインしてしまっているので、ログアウトさせる

                $request->session()->regenerate(); // セッション更新

                return back()->withErrors([ // 権限レベルが0の場合
                    'error' => 'You do not have permission to log in.',
                ]);
            }
        }


        return back()->withErrors([ // ログインに失敗した場合
            'error' => 'The provided credentials do not match our records.',
        ]);
    }


    
}

