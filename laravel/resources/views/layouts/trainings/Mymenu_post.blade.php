<x-trainings.app> 
        <main class="grow m-10">
        <div class="flex m-3 justify-center">
                <!--Chestcard  -->
                <div class="w-full max-w-sm p-4 mr-3 bg-white border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700 ">
                    <h5 class="mb-3 text-base text-center font-semibold text-gray-900 md:text-xl dark:text-white">
                        {{$chest->name}}トレーニング(Chest)
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
                            <span class="flex-1 ml-3 whitespace-nowrap text-lg">{{$item->name}} </span>
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
                        {{$back->name}}トレーニング(back)
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
                        {{$legs->name}}トレーニング(legs)
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
                {{$arms_shoulders->name}}トレーニング(arms_shoulders)
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
</x-trainings.app> 