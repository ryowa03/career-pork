<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
//postモデルを使用するためのuse宣言


class PostController extends Controller
{
   
 

  public function create() {
          return view('post.create');
              }
    
  
  public function show(Post $post) {
return view('post.show',compact('post'));
    }


    public function edit(Post $post) {
      return view('post.edit',compact('post'));
          }



                public function destroy(Request $request,Post $post) {
                  $post->delete();
                  $request->session()->flash('message','削除しました');
                  return redirect('post');
                        }
                
        

    //保存完了を表示させたくば以下も入れる。
    // public function store(Request $request) {
    //   $post = Post::create([
    //    'title' => $request ->title,
    //    'body' => $request ->body
    //   ]);
    //   $request->session()->flash('message','保存しました');
    //           return back();
    //               }


  //           public function store(Request $request) {
  //             $validated = $request ->validate([
          
  //          'title' => 'required|max:20',
  //          'body' => 'required|max:400',
  //          'image' => 'required|image|max:2048|mimes:jpeg,png,jpg,gif', // 画像のバリデーションルールを追加
  //         ]);

  //         $validated['user_id'] = auth() ->id();

  //           // 画像のアップロード処理
  //   if ($request->hasFile('image')) {
  //     $imagePath = $request->file('image')->store('images'); // 'images'ディレクトリに画像を保存
  //     $validated['image'] = $imagePath; // 画像の保存パスをデータベースに保存
  // }
       
  
  
  public function store(Request $request)
  {

 // バリデーションルール
 $inputs=request()->validate([
  'title'=>'required|max:255',
  'body'=>'required|max:255',
]);


    $imagePath = $request->file('image')->store('images', 'public',);

      // 
      $post = new Post(); //これで新しいpostsテーブルのレコード作っている
      $post->title = $request->input('title');
      $post->body = $request->input('body');
      $post->body2 = $request->input('body');
      $post->image_path = $imagePath; // 画像の保存パスを保存します
      $post->save();
      
      return back();
    }

    
    public function index() {
      $posts=Post::all();
      //Post::allと書くことでPostモデルを介してpostsテーブルのデータをデータを取得’
      //↑の処理でモデルからデータを取得し、2個下↓の処理でビューに表示する。それらをindexメソッドとして定義している
      // $posts=Post::where('user_id',1)->whereDate('created_at','>=','2024-02-24')->get();
      return view('post.index',compact('posts'));
          }


   }

      // // 画像ファイルの保存場所指定
      // if(request('image')){
      //     $filename=request()->file('image')->getClientOriginalName();
      //     $inputs['image']=request('image')->storeAs('public/images', $filename);
      // }

      // // postを保存
      // $post->create($inputs);

   







//           //投稿の作成
//           $post = Post::create($validated);
//           return back()->with('success', '投稿が作成されました。');
//                       }



//                       public function update(Request $request, Post $post) {
//                         $validated = $request ->validate([
                    
//                      'title' => 'required|max:20',
//                      'body' => 'required|max:400',
//                     ]);
          
//                     $validated['user_id'] = auth() ->id();
//                     $post->update($validated);
//                     $request->session()->flash('message','更新しました');
                   
//                             return back();
//                                 }
// }

