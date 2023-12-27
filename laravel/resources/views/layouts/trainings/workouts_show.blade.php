<x-trainings.app>

<main class="grow max-w-7xl m-10 w-full">

<ol class="relative max-w-xl mx-auto border-s border-gray-600 dark:border-gray-700">
@foreach($other_user_trainings as $index => $training)
@if($index < 3)
        <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3
        mt-5 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
            <svg class="w-3.5 h-3.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
            </svg>
        </span>
     <li class="mb-10 ms-6 bg-white w-full max-w-6xl  border border-gray-200 rounded-lg shadow p-6 dark:bg-gray-800 dark:border-gray-700">
                <div class="header text-center relative pb-2">
                    <!-- ユーザー名 -->
                    <h2 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">{{$training->user->name}}'sTraining!!
                     <span class="absolute bottom-4 right-0 mt-4 bg-rose-500 text-white text-xs  font-medium  px-2.5 rounded dark:bg-blue-900 dark:text-white ms-3">{{$training->created_at->format('Y年m月d日') }}</span>
                    </h2>
                </div>
                <div class="flex p-2 items-baseline ">
                        <!-- トレーニング名 -->
                        <div class="header mx-auto flex flex-col items-center">
                            <label class="text-gray-600 my-1.5">トレーニング名</label>
                            <p class="text-2xl font-bold text-gray-800">{{ $training->title }}</p>
                        </div> 
                       <div class="body ml-auto">
@foreach($training->sets as $set)
                         <div class="grid grid-cols-3 gap-4">
                                <!-- 重量 -->
                                <div class="flex flex-col items-center">
                                    <label class="text-gray-600 my-1.5">重量</label>
                                    <p class="text-lg font-semibold text-gray-800">{{ $set->weight }} kg</p>
                                </div>

                                <!-- 回数 -->
                                <div class="flex flex-col items-center">
                                    <label class="text-gray-600 my-1.5">回数</label>
                                    <p class="text-lg font-semibold text-gray-800">{{ $set->rep }} 回</p>
                                </div>

                                <!-- セット数 -->
                                <div class="flex flex-col items-center">
                                    <label class="text-gray-600 my-1.5">セット数</label>
                                    <p class="text-lg font-semibold text-gray-800">{{ $set->set_id }} セット目</p>
                                </div>
                         </div> 

                        </div>
                  </div>

<div class="my-2 mx-2 text-right">

    <button class="like-button" id="like-button-{{ $training->id }}" data-training-id="{{ $training->id }}">
        <span class="like-status" data-training-id="{{ $training->id }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
            </svg>
        </span>
    </button>
        <span class="like-count" id="like-count-{{ $training->id }}" data-training-id="{{ $training->id }}" >
            {{ $training->likes->count() }}
        </span>
</div>


            @endforeach

</li>
        @else
        @break
        @endif
        @endforeach
</ol>

<div class="max-w-sm mx-auto">
    {{$other_user_trainings->links()}}
</div>   

</main>
<script>
        $(document).ready(function() {
        let debounceTimer;
        // いいねがクリックされた時
        $(document).on('click','.like-button', function(){
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
            const  $button = $(this);
            const trainingId = $button.data('training-id');
            const csrfToken = $('meta[name="csrf-token"]').attr('content');
            
            $.ajax({
                type: 'POST',
                url:  `/trainings/${trainingId}/like`,
                data: {
                    training_id: trainingId,
                    _token: $('meta[name="csrf-token"]').attr('content') // CSRFトークンを含める

                },

                success: function(data) {
            // 成功したらいいね数とボタンのスタイルを更新
                const $CountElement = $('#like-count-' + trainingId);
                const $StatusElement = $button.find('.like-status');
                // いいね数を更新
                $CountElement.text(data.likeCount);

                if (data.isLiked) {

                    $StatusElement.html('<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-rose-500"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" /></svg>');
                } else {
                    
                    $StatusElement.html('<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" /></svg>');
                    location.reload();
                }
               },
               
            error: function(xhr,status,error) {
            console.error('通信失敗',xhr,status,error);
            },

        });
            }, 100);

    
 });
});

</script>


</x-trainings.app>