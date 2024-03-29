<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         
    </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-white w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1 class="text-lg font-semibold" >
                    {{ $post->title }}
                </h1> 

                <!-- <div>
    {{ $post->image_path }}
</div> -->

                <div>
    @if($post->image_path) <!-- $post->　データーベースからimage_pathを受け取る -->
        <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image" width='50%'>
        <!-- <img src="{{ asset($post->image_path) }}" alt="画像の説明"> -->
    @else
        <!-- 画像が存在しない場合の代替テキストやデフォルトの画像を表示 -->
        <span>No image available</span>
    @endif
</div>



<div class="text-right flex">
                <a href="{{route('infor')}}" class="flex-1">
                <x-primary-button>
                    コンタクトをとる
                </x-primary-button>
                </a>


                <!-- <div class="text-right flex">
                <a href="{{route('post.edit',$post)}}" class="flex-1">
                <x-primary-button>
                    編集
                </x-primary-button>
                </a> -->

<!-- 一時的に削除・編集　機能消す。
                <form method="post" action="{{route('post.destroy', $post)}}" class="flex-2">
                    @csrf
                    @method('delete')
                        <x-primary-button class="bg-red-700 ml-2">
                            削除
                        </x-primary-button>
                    </form> -->

                </div>

                <hr class="w-full" >
                <p class="mt-4 whitespace-pre-line" >
                    {{$post->body}}
                </p>
                <div class="text-sm font-semibold flex flex-row-reverse">
                    <p> {{$post->created_at}}</p >
                </div >
            </div>
        </div>
    </div>
</x-app-layout>