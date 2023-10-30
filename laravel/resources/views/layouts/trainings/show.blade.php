<x-trainings.app> 
                <main class="grow">
                <div class="max-w-7xl mx-auto px-4 sm:px-6">
                        <div class="py-[50px]">
                            <p class="text-3xl font-bold text-center">{{ $events->created_at->format('Y年m月d日') }}の記録です</p>
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

                        <table class="w-full max-w-5xl m-8
                            placeholder:italic placeholder:text-slate-400 block bg-white  border border-slate-100 
                            rounded-md py-4 pl-4 pr-4  shadow-sm 
                            sm:text-sm max-h-max  table-auto">


                            <tbody class="max-w-7xl w-full h-full rounded-md block shadow-sm
                            focus:outline-none sm:text-sm table-auto" >
                            
                                    <tr class="w-full block flex items-center rounded-md h-14
                                     border-separate border border-slate-300 ">
                                        <th scope="col" class="w-1/3 block ">重量(kg)</th>
                                        <th scope="col" class="w-1/3 block ">回数(rep)</th>
                                        <th scope="col" class="w-1/3 block ">総重量(total)</th>
                                    </tr>

                                    @foreach($sets as $set)
                                    <!-- 1~3set.weight/rep -->
                                    <tr class="h-20 block flex items-center  border-separate border border-slate-00
                                     text-center text-bold rounded-md">

                                        <td class="px-6 py-4 w-1/2 flex">
                                            <p class="">{{$set->set_id}}set:</p>
                                           <p class="w-1/2 ml-4">{{$set->weight}}kg</p>
                                        </td> 
                                        <td class="px-6 py-4 w-1/2">
                                            <p class="">{{$set->rep}}回</p>
                                        </td>
                                        <td class="px-6 py-4 w-1/2">
                                            <p class="">{{ $set->weight * $set->rep }}</p>
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
</x-trainings.app> 