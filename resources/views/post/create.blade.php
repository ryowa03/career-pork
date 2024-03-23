<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            フォーム
        </h2>
    </x-slot>
    
    <div class="max-w-7xl mx-auto px-6">
        @if(session('message'))
            <div class="text-red-600 font-bold">
                {{ session('message') }}
            </div>
        @endif


        <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="title" class="font-semibold mt-4">件名</label>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-md" id="title" value="{{ old('title') }}">
                </div>
            </div>

            <div class="w-full flex flex-col">
                <label for="body" class="font-semibold mt-4">本文</label>
                <x-input-error :messages="$errors->get('body')" class="mt-2" />
                <textarea name="body" class="w-auto py-2 border border-gray-300 rounded-md" id="body" cols="30" rows="5">{{ old('body') }}</textarea>
            </div>



        <div>
            <input type="file" name="image">
            <button>アップロード</button>
        </div>
        
        
            <!-- <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="image" class="font-semibold mt-4">画像</label>
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    <input type="file" name="image" class="w-auto py-2 border border-gray-300 rounded-md" id="image">
                </div>
            </div> -->

            <!-- <div class="mt-8">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    画像をアップロード
                </button>
            </div> -->

            <x-primary-button class="mt-4">
                送信する
            </x-primary-button>
        </form>
    </div>
</x-app-layout>