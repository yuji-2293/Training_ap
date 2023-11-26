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
             <button class="like-button" data-training-id="{{ $training->id }}">いいね</button>
             <span class="like-count" data-training-id="{{ $training->id }}" >{{ $training->likes->count() }} いいね</span>
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
        
        // いいねがクリックされた時
        $(document).ready(function(){
            $('.like-button').click(function(){
            const  $button = $(this);
            const trainingId = $button.data('training-id');
            console.log(trainingId);
            console.log($button);
            var csrfToken = 
                      document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            $.ajax({
                type: 'POST',
                url:  `/trainings/{trainingId}/like`,
                data: {
                    training_id: trainingId,
                    
                },
                headers: {
                        'X-CSRF-TOKEN' : csrfToken
                      },
                success: function(data) {
            // 成功したらいいね数を更新
                const likeCountElement = $(`.like-count[data-training-id="${trainingId}"]`);
                 likeCountElement.text(`${data.likeCount} いいね`);
                const isLiked = data.isLiked;

                if (isLiked) {
                    $button.text('いいね解除');
                    likeCountElement.text(`${data.likeCount} いいね`);
                } else {
                    $button.text('いいね');
                    likeCountElement.text(`${data.likeCount} いいね`);
                }
               },
            error: function(error) {
            console.error('通信失敗');
            }
            });
            });
            });


</script>


</x-trainings.app>