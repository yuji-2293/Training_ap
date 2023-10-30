<x-trainings.app>

        <main class="grow m-10">
                  <form action="{{route('part_update',['id' => $show->id]) }}" method="POST" class="max-w-7xl px-4
                 sm:px-6 mx-auto flex flex-col items-center" >
                 @csrf
                            <div class="flex flex-col items-center mt-12 mb-8  w-3/6">
                                <label class="text-2xl font-bold text-center mb-5 ">編集するマイメニュー</label>
                                    <div class="mr-auto">
                                        <small class="text-sm ml-3"><カテゴリー></small>
                                        <small class="text-sm text-rose-600">※選択必須</small>
                                    </div>

                                        <select type="text" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:border-sky-500 focus:ring-1 
                                        block p-2.5 w-full 
                                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="part_id" id="part_id" required>

                                        <option disabled style='display:none;' class="" @if (empty($My_menu_post->part_id))selected @endif >選択してください</option>
                                            @foreach($parts as $part)
                                                <option class="block" value="{{ $part->id }}"
                                                @if (isset($My_menu_post->part_id) && ($My_menu_post->part_id === $part_id)) selected @endif>{{ $part->name }}</option>
                                            @endforeach
                                        </select>
                            </div>
                        <div class="flex flex-col items-center w-5/6">
                                <div class="max-w-3xl block w-4/5">
                                    <small class="text-sm ml-3"><本文></small>
                                    <small class="text-sm text-rose-600">※入力必須</small>
                                </div>
                                <div class="w-full max-w-3xl  flex ">
                                        <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full 
                                        border border-slate-300 rounded-md focus:outline-none focus:border-sky-500 focus:ring-1
                                        py-4 pl-4 shadow-sm sm:text-sm mb-30  " placeholder="{{$show->name}}" type="text" value="{{old('name')}}" class="" name="name" id="name">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <div class="sm:text-sm ml-1">
                                            <button id="updateButton" type="submit"class="shadow-sm border border-slate-300 rounded-md
                                            py-4 w-20 md:hover:bg-sky-300 bg-rose-500 text-white  hover:bg-sky-300">更新する</button>
                                            @csrf
                                            @method('PUT')
                                        </div>
                        </form>                
                        <form action="{{route('part_destroy',['id' => $show->id]) }}" method="POST">
                                @csrf
                            @method('DELETE')
                        <div class="bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:border-sky-500 
                            focus:ring-sky-500 focus:ring-1 sm:text-sm mb-30">
                            <button id="" type="submit" onclick = "return confirm('削除してもよろしいですか？')"
                            class="py-4 w-20 md:hover:bg-slate-200 transition-colors inline-block text-gray-500 font-medium">削除する</button>
                            
                        </div> 
                        </form>

                                 </div> 

                    @error('name')
                      @error('part_id')
                            <div class="mt-3">
                                <p class="text-red-500">
                                    {{$message}}
                                </p>
                            </div>
                      @enderror
                    @enderror
                            <div class="">
                                <a href="{{route('part_create') }}" type="button" class="shadow-sm border border-slate-300 block 
                                rounded-md p-3 mt-20 md:hover:bg-sky-300 bg-sky-600 hover:bg-sky-300 text-white ">>>登録したマイメニューを確認する</a>
                            </div>
                </div>
        </main>
</x-trainings.app>