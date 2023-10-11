<!DOCTYPE html>
<html lang="ja">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <title>showページ</title>
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
                                <a href="{{ route('trainings.create') }}" class="text-white text-xl font-bold">トレーニングを記録する</a>
                                @method('get')
                                <a href="{{ route('trainings.Mymenu') }}" class="text-white text-xl font-bold">/マイメニューを記録する</a>
                            </div>
                        </div>
                </header>
                <main class="grow">
                <div class="max-w-7xl mx-auto px-4 sm:px-6">
                        <div class="py-[50px]">
                            <p class="text-3xl font-bold text-center">{{ $events->start}}の記録です</p>
                        </div>
                </div>
                <div class="flex flex-col items-center">
                        <div class="w-full max-w-3xl mx-auto flex">
                                <p class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md
                                py-4 pl-4 shadow-sm sm:text-sm mb-30">
                                {{$events->title}}
                                </p>
                            <div class="bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:border-sky-500 
                                focus:ring-sky-500 focus:ring-1 sm:text-sm mb-30">
                                <form onsubmit="return deleteTask();"
                                action="/events/{{ $events->id }}" method="post"
                                class="inline-block text-gray-500 font-medium"
                                role="menuitem" tabindex="-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                class="py-4 w-20 md:hover:bg-slate-200 transition-colors">削除する</button>
                                </form>
                            </div>
                       </div>

                        <table class="border w-full max-w-5xl border m-8
                            placeholder:italic placeholder:text-slate-400 block bg-white  border border-slate-100 
                            rounded-md py-4 pl-4 pr-4  shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 
                            sm:text-sm max-h-max  table-auto">


                            <tbody class="max-w-7xl w-full h-full rounded-md border block shadow-sm 
                            focus:outline-none focus:border-sky-500 sm:text-sm table-auto  focus:ring-1 border-slate-200" >
                            
                                    <tr class="w-full block flex items-center rounded-md h-14
                                     border-separate border border-slate-200 ">
                                        <th scope="col" class="w-1/2 block ">重量(kg)</th>
                                        <th scope="col" class="w-1/2 block ">回数(rep)</th>
                                    </tr>

                                    @foreach($sets as $set)
                                    <!-- 1~3set.weight/rep -->
                                    <tr class="h-20 block flex items-center  border-separate border border-slate-200">
                                        <td class="px-6 py-4 w-1/2 flex ">
                                            <p class="m-auto ">{{$set->set_id}}set:{{$set->weight}}kg</p>
                                        </td> 
                                        <td class="px-6 py-4 w-1/2">
                                            <p class="text-center">{{$set->rep}}回</p>
                                    </td>
                                    </tr> 
                                    @endforeach

                            </tbody>
                        </table> 

                </div>
                </main>

                <script>
                    function deleteTask(){
                    if (confirm('本当に削除しますか？')){
                        return true;
                    } else {
                        return false;
                    }
                    }
                </script>

            <footer class="bg-slate-500">
                <div class="max-w-7xl mx-auto px-4 sm:px-6">
                    <div class="py-4 text-center">
                        <p class="text-white text-sm">筋トレ記録管理アプリ</p>
                    </div>
                </div>
            </footer>
        </body>
</html>