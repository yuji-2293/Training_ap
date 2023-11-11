
<x-trainings.app>
        <main class="grow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="py-[50px]">
                    <p class="text-2xl font-bold text-center">今日のトレーニングを記録しましょう！！</p>
                    
                </div>
            </div>

<!--ChestCard  -->
        <div class="w-full  p-4 mr-3 bg-white border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700 ">
            <h5 class="mb-3 text-base text-center font-semibold text-gray-900 md:text-xl dark:text-white">
                {{$legs->name}}トレーニング(legs)
            </h5>
                @foreach($POST as $item )
                @if($item->part_id == 3)
 <div class="text-center">
                <ul class="my-4 space-y-3">
                <li class="">
                    <x-form class="">
                    <input class="rounded-md h-10 border-separate border border-slate-300 shadow" type="text" name="title" value="{{$item->name}}">
                    </x-form>
                </li>
                @endif
                @endforeach
            </ul>
                <div class="">
                    <a href="{{ route('trainings.Mymenu') }}" class="inline-flex items-center  text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                        >マイメニュー登録画面へ
                    </a>
                </div>
            </div>
 </div>


        </main>
</x-trainings.app>