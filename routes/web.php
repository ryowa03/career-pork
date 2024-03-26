<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;

use App\Http\Controllers\PostController;

use App\Http\Controllers\LoginController;


// use App\Http\Controllers\ProfileController as ProfileOfAdminController;


//これ要因　上も

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth:admin', 'verified'])->name('dashboard');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/profile', [ProfileOfAdminController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileOfAdminController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileOfAdminController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/admin.php';
});





Route::get('post/{post}/edit', [PostController::class, 'edit'])
->name('post.edit');

Route::patch('post/{post}', [PostController::class, 'update'])
->name('post.update');

Route::delete('post/{post}', [PostController::class, 'destroy'])
->name('post.destroy');

Route::get('/admin/login', function () {
    return view('admin.auth.adminLogin'); // プラウザで/admin/loginに行くと、adminloginblade.phpが表示
});

Route::post('/admin/login', [LoginController::class, 'adminLogin'])
->name('admin.login');




// Route::post('/post', 'PostController@store')->name('post.store');
//web.phpの26行目エラー対策

Route::get('post/show/{post}', [PostController::class, 'show'])
->name('post.show');

Route::get('/test', [TestController::class, 'test'])
->name('test');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('post/create',[PostController::class,'create'])
->middleware(['auth','admin']);
//上記ミドルウェアが機能しているみたい。ユーザーログイン状態でpost/createいこうとすると、ダッシュボードに遷移する。
//post.create行きたかったから、コメントアウトした。

Route::post('post',[PostController::class,'store'])
->name('post.store'); 

//ここでpostというアドレスindexの表示、それらの設定自体をpost.indexと名付けている
Route::get('post',[PostController::class,'index'])
->name('post.index'); 


// Route::middleware(['auth','admin'])->group(function () {
//     Route::get('post', [PostController::class, 'index']);
//     Route::get('post/create', [PostController::class, 'create']);
//  });



Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


