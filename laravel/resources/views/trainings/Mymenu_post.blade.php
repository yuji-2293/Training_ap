<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>マイメニュー確認</title>
</head>
<body class="flex flex-col min-h-[100vh] font-mono bg-slate-200">
        <header class="bg-sky-600">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 flex relative">    
                                <div class="py-4">
                                <a href="{{route('trainings.index')}}" class="text-white text-xl font-bold">>>TOPへ戻る</a>
                                </div>
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white text-xl font-bold py-4 flex absolute inset-y-0 right-5 hover:bg-sky-400 
                                rounded-lg text-center inline-flex items-center " type="button">メニューを表示（仮）
                            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                    </button>
                    </div> 
                    <!-- Dropdown menu -->
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                        <a href="{{ route('trainings.Mymenu') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">マイメニューの登録</a>
                        </li>
                        <li>       
                            <a href="{{route('part_create') }}"class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">マイメニューの確認</a>
                        </li>
                        <li>
                            <a href="{{ route('trainings.create') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">ワークアウトの登録</a>
                        </li>
                        </ul>
                    </div>
        </header>
        <main class="grow m-10">
        <div class="flex m-3 justify-center">
                <!--Chestcard  -->
                <div class="w-full max-w-sm p-4 mr-3 bg-white border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700 ">
                    <h5 class="mb-3 text-base text-center font-semibold text-gray-900 md:text-xl dark:text-white">
                        {{$chest->name}}(Chest)
                    </h5>
                    <p class="text-sm text-right font-normal text-gray-500 dark:text-gray-400">>トレーニングをクリックすると詳細を表示</p>

                <ul class="my-4 space-y-3 relative">
                        @foreach($POST as $item )
                        @if($item->part_id == 1)
                    <li class="">
                        <span class="absolute right-0 inline-flex items-center justify-center text-xs font-medium text-gray-500 bg-gray-50 rounded-lg px-2 py-0.5 ml-3">
                            {{$item->Up}}</span>
                        <a href="{{ route ('part_edit',['id'=>$item->id]) }}" class="flex items-center p-3 text-base font-bold text-gray-900 
                        rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 
                        dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ml-3 whitespace-nowrap text-lg">{{$item->name}}</span>
                            <span class="  
                                dark:bg-gray-700 dark:text-gray-400">
                            </span>

                        </a>
                    </li>
                        @endif
                        @endforeach
                </ul>
                <div class="text-right">
                    <a href="{{ route('trainings.Mymenu') }}" class="inline-flex items-center  text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                        >マイメニュー登録画面へ
                    </a>
                </div>
            </div>
            <!--Backcard  -->
                <div class="w-full max-w-sm p-4 mr-3 bg-white border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700 ">
                    <h5 class="mb-3 text-base text-center font-semibold text-gray-900 md:text-xl dark:text-white">
                        {{$back->name}}(back)
                    </h5>
                    <p class="text-sm text-right font-normal text-gray-500 dark:text-gray-400">>トレーニングをクリックすると詳細を表示</p>

                <ul class="my-4 space-y-3 relative">
                        @foreach($POST as $item )
                        @if($item->part_id == 2)
                    <li class="">
                        <span class="absolute right-0 inline-flex items-center justify-center text-xs font-medium text-gray-500 bg-gray-50 rounded-lg px-2 py-0.5 ml-3">
                            {{$item->Up }}</span>
                        <a href="{{ route ('part_edit',['id'=>$item->id]) }}" class="flex items-center p-3 text-base font-bold text-gray-900 
                        rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 
                        dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ml-3 whitespace-nowrap text-lg">{{$item->name}}</span>
                            <span class="  
                                dark:bg-gray-700 dark:text-gray-400">
                            </span>

                        </a>
                    </li>
                        @endif
                        @endforeach
                </ul>
                <div class="text-right">
                    <a href="{{ route('trainings.Mymenu') }}" class="inline-flex items-center  text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                        >マイメニュー登録画面へ
                    </a>
                </div>
            </div>
            <!-- legscard -->
                <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700 ">
                    <h5 class="mb-3 text-base text-center font-semibold text-gray-900 md:text-xl dark:text-white">
                        {{$legs->name}}(legs)
                    </h5>
                    <p class="text-sm text-right font-normal text-gray-500 dark:text-gray-400">>トレーニングをクリックすると詳細を表示</p>

                <ul class="my-4 space-y-3 relative">
                        @foreach($POST as $item )
                        @if($item->part_id == 3)
                    <li class="">
                        <span class="absolute right-0 inline-flex items-center justify-center text-xs font-medium text-gray-500 bg-gray-50 rounded-lg px-2 py-0.5 ml-3">
                            {{$item->Up}}</span>
                        <a href="{{ route ('part_edit',['id'=>$item->id]) }}" class="flex items-center p-3 text-base font-bold text-gray-900 
                        rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 
                        dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ml-3 whitespace-nowrap text-lg">{{$item->name}}</span>
                            <span class="  
                                dark:bg-gray-700 dark:text-gray-400">
                            </span>

                        </a>
                    </li>
                        @endif
                        @endforeach
                </ul>
                <div class="text-right">
                    <a href="{{ route('trainings.Mymenu') }}" class="inline-flex items-center  text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                        >マイメニュー登録画面へ
                    </a>
                </div>
            </div>
       </div>
       <div class="flex justify-center m-3">
        <!-- arms_shoulderscard -->
        <div class="w-full max-w-sm p-4 mr-3 bg-white border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700 ">
            <h5 class="mb-3 text-base text-center font-semibold text-gray-900 md:text-xl dark:text-white">
                {{$arms_shoulders->name}}(arms_shoulders)
            </h5>
            <p class="text-sm text-right font-normal text-gray-500 dark:text-gray-400">>トレーニングをクリックすると詳細を表示</p>

        <ul class="my-4 space-y-3 relative">
             @foreach($POST as $item )
             @if($item->part_id == 4)
            <li class="">
                <span class="absolute right-0 inline-flex items-center justify-center text-xs font-medium text-gray-500 bg-gray-50 rounded-lg px-2 py-0.5 ml-3">
                    {{$item->Up}}</span>
                <a href="{{ route ('part_edit',['id'=>$item->id]) }}" class="flex items-center p-3 text-base font-bold text-gray-900 
                rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 
                dark:hover:bg-gray-500 dark:text-white">
                    <span class="flex-1 ml-3 whitespace-nowrap text-lg">{{$item->name}}</span>
                    <span class="  
                     dark:bg-gray-700 dark:text-gray-400">
                    </span>

                </a>
            </li>
             @endif
             @endforeach
        </ul>
        <div class="text-right">
            <a href="{{ route('trainings.Mymenu') }}" class="inline-flex items-center  text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                >マイメニュー登録画面へ
            </a>
        </div>
    </div>
<!-- othercard -->
        <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700 ">
            <h5 class="mb-3 text-base text-center font-semibold text-gray-900 md:text-xl dark:text-white">
                {{$other->name}}(other)
            </h5>
            <p class="text-sm text-right font-normal text-gray-500 dark:text-gray-400">>トレーニングをクリックすると詳細を表示</p>

        <ul class="my-4 space-y-3 relative">
             @foreach($POST as $item )
             @if($item->part_id == 5)
            <li class="">
                <span class="absolute right-0 inline-flex items-center justify-center text-xs font-medium text-gray-500 bg-gray-50 rounded-lg px-2 py-0.5 ml-3">
                    {{$item->Up}}</span>
                <a href="{{ route ('part_edit',['id'=>$item->id]) }}" class="flex items-center p-3 text-base font-bold text-gray-900 
                rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 
                dark:hover:bg-gray-500 dark:text-white">
                    <span class="flex-1 ml-3 whitespace-nowrap text-lg">{{$item->name}}</span>
                    <span class="  
                     dark:bg-gray-700 dark:text-gray-400">
                    </span>

                </a>
            </li>
             @endif
             @endforeach
        </ul>
        <div class="text-right">
            <a href="{{ route('trainings.Mymenu') }}" class="inline-flex items-center  text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                >マイメニュー登録画面へ
            </a>
        </div>
    </div>
       </div>


        </main>






        <footer class="bg-slate-500">
                <div class="max-w-7xl mx-auto px-4 sm:px-6">
                    <div class="py-4 text-center">
                        <p class="text-white text-sm">筋トレ記録管理アプリ</p>
                    </div>
                </div>
            </footer>
</body>
</html>