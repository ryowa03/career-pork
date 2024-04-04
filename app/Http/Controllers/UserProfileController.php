<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile; // UserProfileモデルの名前を適切に修正してください

class UserProfileController extends Controller
{
    public function store(Request $request)
    {
        // バリデーションを行う
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'birthday' => 'required|date',
            'post_code' => 'required|string',
            'address' => 'required|string',
          
        ]);

        // // 画像のアップロード処理
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('images');
        //     $validatedData['image'] = $imagePath;
        // }

        // プロフィール情報を保存する
        UserProfile::create($validatedData);

        // 成功メッセージをセッションに保存してリダイレクトする
        return redirect()->route('dashboard')->with('message', 'プロフィール情報が保存されました。');
    }
}