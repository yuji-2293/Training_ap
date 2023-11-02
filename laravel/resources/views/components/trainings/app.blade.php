<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>管理者ページ</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
        <body class="antialiased flex flex-col min-h-[100vh] font-mono bg-slate-200">
         <header class="bg-sky-600 flex justify-around">
                <div class="text-white text-white text-xl font-bold max-w-7xl mx-auto px-4 sm:px-6 ">
                            <div class="py-4 text-center">
                                <a href="" class="text-white text-xl font-bold">筋トレ記録管理アプリ</a>
                            </div>    
                    <div class="py-4 flex space-x-36">
                        <a href="{{('/')}}" class="font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">TOP</a>
                        <a href="" class="font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Howto~使い方</a>
                        <a href="{{ route('trainings.create') }}" class="font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">ワークアウトの登録</a>

                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" type="button">Myメニュー
                                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                        </button>
                    <!-- Dropdown menu -->
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                           <a href="{{ route('trainings.Mymenu') }}" class="block px-4 py-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">マイメニューの登録</a>
                        </li>
                        <li>
                           <a href="{{ route('part_create') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">マイメニューの確認</a>
                        </li>
                    </ul>
                </div>

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">管理画面</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">ログイン</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">ユーザー登録</a>
                            @endif
                        @endauth
                    @endif
                    </div>
                </div> 

             </header>
{{$slot}}


    <footer class="bg-slate-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-4 text-center">
                <p class="text-white text-sm">筋トレ記録管理アプリ</p>
            </div>
        </div>
    </footer>

</body>
</html>