<x-trainings.app>
<main class="grow mx-auto max-w-7xl m-10">

<ol class="relative border-s border-gray-600 dark:border-gray-700">
    
    @foreach($other_user_trainings as $index => $training)
    @if($index < 3)
    <li class="mb-10 ms-6 bg-white">
        <h3 class=" flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">{{$training->user->name}}
        <span class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ms-3">{{$training->created_at->format('Y年m月d日') }}</span>
        </h3>
        <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
            <svg class="w-3.5 h-3.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
            </svg>
        </span>
    <p>{{ $training->title }}</p>  

    @foreach($training->sets as $set)
 
<p>{{ $set->set_id }}set</p>
<p>{{ $set->weight }}kg</p>
<p>{{ $set->rep }}回</p>
@endforeach
</li>
@else
@break
    @endif
    @endforeach
    
    </ol>
{{$other_user_trainings->links()}}

</main>


</x-trainings.app>