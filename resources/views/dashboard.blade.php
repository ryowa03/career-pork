<x-admin-layout>
<!-- <x-app-layout> -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- <div class="py-12" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" >
                  <x-primary-button href="{{ route('post.index') }}">
                  ボタン
                  </x-primary-button>
                </div>
            </div>
        </div>
    </div> -->


    <div style ="text-align:center;" >
    <img src="../../career-pork/image/topimg.png" alt="画像の説明">
    </div>



    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('post.index') }}" class="inline-flex items-center px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xl text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    企業情報一覧へ
                </a>
            </div>
        </div>
    </div>
</div>


<!-- </x-app-layout> -->
</x-admin-layout>
