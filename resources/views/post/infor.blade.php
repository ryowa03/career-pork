<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            プロフィール入力
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
                <div class="">
                    <label for="title" class="font-semibold mt-4">氏名</label>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    <div>
                        <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-md" id="title" value="{{ old('title') }}">
                    </div>
                </div>
            </div>


            <div class="mt-8">
                <div class="">
                    <label for="title" class="font-semibold mt-4">メールアドレス</label>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    <div>
                        <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-md" id="title" value="{{ old('title') }}">
                    </div>
                </div>
            </div>


            <div class="mt-8">
                <div class="">
                    <label for="title" class="font-semibold mt-4">電話番号</label>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    <div>
                        <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-md" id="title" value="{{ old('title') }}">
                    </div>
                </div>
            </div>


            <div class="mt-8">
                <div class="">
                    <label for="title" class="font-semibold mt-4">生年月日</label>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    <div>
                        <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-md" id="title" value="{{ old('title') }}">
                    </div>
                </div>
            </div>



            <div class="mt-8">
                <div class="">
                    <label for="title" class="font-semibold mt-4">郵便番号</label>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    <div>
                        <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-md" id="title" value="{{ old('title') }}">
                    </div>
                </div>
            </div>



            <div class="mt-8">
                <div class="">
                    <label for="title" class="font-semibold mt-4">住所</label>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    <div>
                        <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-md" id="title" value="{{ old('title') }}">
                    </div>
                </div>
            </div>


            <br>
            <br>
            <br>


            <div>
                <input type="file" name="image">
                <button></button>
            </div>


            <br>


            <x-primary-button class="mt-4">
                送信する
            </x-primary-button>
        </form>
    </div>
</x-app-layout>