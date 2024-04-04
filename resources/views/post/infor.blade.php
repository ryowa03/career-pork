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


        <form method="post" action="{{ route('user.profile.save') }}" enctype="multipart/form-data">
            @csrf




            <div class="mt-8">
                <div class="">
                    <label for="title" class="font-semibold mt-4">氏名</label>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    <div>
                        <input type="text" name="name" class="w-auto py-2 border border-gray-300 rounded-md" id="name" value="{{ old('name') }}">
                    </div>
                </div>
            </div>


            <div class="mt-8">
                <div class="">
                    <label for="title" class="font-semibold mt-4">メールアドレス</label>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <div>
                        <input type="text" name="email" class="w-auto py-2 border border-gray-300 rounded-md" id="email" value="{{ old('email') }}">
                    </div>
                </div>
            </div>


            <div class="mt-8">
                <div class="">
                    <label for="title" class="font-semibold mt-4">電話番号</label>
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    <div>
                        <input type="number" name="phone" class="w-auto py-2 border border-gray-300 rounded-md" id="phone" value="{{ old('phone') }}">
                    </div>
                </div>
            </div>


            <div class="mt-8">
                <div class="">
                    <label for="title" class="font-semibold mt-4">生年月日</label>
                    <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
                    <div>
                        <input type="date" name="birthday" class="w-auto py-2 border border-gray-300 rounded-md" id="birthday" value="{{ old('birthday') }}">
                    </div>
                </div>
            </div>



            <div class="mt-8">
                <div class="">
                    <label for="title" class="font-semibold mt-4">郵便番号</label>
                    <x-input-error :messages="$errors->get('post_code')" class="mt-2" />
                    <div>
                        <input type="number" name="post_code" class="w-auto py-2 border border-gray-300 rounded-md" id="post_code" value="{{ old('post_code') }}">
                    </div>
                </div>
            </div>



            <div class="mt-8">
                <div class="">
                    <label for="title" class="font-semibold mt-4">住所</label>
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    <div>
                        <input type="text" name="address" class="w-auto py-2 border border-gray-300 rounded-md" id="address" value="{{ old('address') }}">
                    </div>
                </div>
            </div>


            <br>
            <br>
            <br>


          

        


            <x-primary-button class="mt-4">
                送信する
            </x-primary-button>
        </form>
    </div>
</x-app-layout>