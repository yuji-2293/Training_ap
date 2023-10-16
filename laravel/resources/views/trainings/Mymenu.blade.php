<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>マイメニュー</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="flex flex-col min-h-[100vh] font-mono bg-slate-200">
        <header class="bg-sky-600 ">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 flex relative">
                    <div class="py-4">
                        <a href="{{route('trainings.index')}}" class="text-white text-xl font-bold">>TOPへ戻る</a>
                        @method('get')
                    </div>
                    <div class="py-4 flex absolute inset-y-0 right-5">
                        <a href="{{ route('trainings.create') }}" class="text-white text-xl font-bold">トレーニングを記録する/</a>
                        <a href="{{ route('trainings.create') }}" class="text-white text-xl font-bold">マイメニューを確認する</a>
                        @method('get')
                    </div>
                </div>
        </header>
        <main class="grow m-10">
            <form action="{{route('part_store') }}" method="POST" class="max-w-7xl px-4 sm:px-6 mx-auto flex flex-col items-center">
                <div class="flex flex-col items-center mt-12 mb-8  w-3/6">
                    <label class="text-2xl font-bold text-center mb-5">登録するトレーニング部位</label>
                    <small class="text-sm text-rose-600">※必須</small>
                    <select type="text" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:border-sky-500 focus:ring-1 
                     block p-2.5 w-full
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                    dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="part_id" id="part_id" required>
                        <option disabled style='display:none;' @if (empty($My_menu_post->part_id))selected @endif >選択してください</option>
                        @foreach($parts as $part)
                            <option class="block" value="{{ $part->id }}"@if (isset($My_menu_post->part_id) && ($My_menu_post->part_id === $part_id)) selected @endif>{{ $part->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col items-center w-full">
                        <small class="text-sm text-rose-600">※入力欄</small>
                            <div class="w-full max-w-3xl mx-auto flex ">
                                    <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full 
                                    border border-slate-300 rounded-md focus:outline-none focus:border-sky-500 focus:ring-1
                                    py-4 pl-4 shadow-sm sm:text-sm mb-30  " placeholder="マイトレーニング" type="text" class="" name="name" id="name">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                    <div class="sm:text-sm ml-1">
                                        <button type="submit"class="shadow-sm border border-slate-300 rounded-md py-4 w-20 md:hover:bg-sky-300 bg-sky-600 text-white  hover:bg-sky-300">登録する</button>
                                    </div> 
                                                
                            </div>
                            <div class="">
                                <a href="" type="button" class="shadow-sm border border-slate-300 block rounded-md p-3 mt-20 md:hover:bg-sky-300 bg-sky-600  hover:bg-sky-300 text-white ">>>登録したマイメニューを確認する</a>

                            </div>

                            @error('name')
                                <div class="mt-3">
                                    <p class="text-red-500">
                                        {{$message}}
                                    </p>
                                </div>
                            @enderror
                </div>
            </form>




 





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