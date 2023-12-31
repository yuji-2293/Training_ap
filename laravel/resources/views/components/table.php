<form action="{{route('store') }}" method="post">
            @csrf
            <!-- トレーニング名入力欄 -->
                <div class="flex flex-col items-center">
                                <label class="w-full max-w-3xl mx-auto">
                                    <input
                                        class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md
                                        py-4 pl-4 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm mb-30"
                                        placeholder="トレーニングメニュー欄" type="text" id="title" name="title" value="{{old('title')}} ">
                                        @method('post')
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        @error('name')
                                            <div class="mt-3">
                                                <p class="text-red-500">
                                                    {{$message}}
                                                </p>
                                            </div>
                                        @enderror
                                </label>
                                                <div class="flex">
                                                    <div class="mr-6">
                                                        @error('first_weight')
                                                        <div class="mt-3"><p class="text-red-500">{{$message}}</p></div>
                                                        @enderror
                                                        @error('second_weight')
                                                        <div class="mt-3"><p class="text-red-500">{{$message}}</p></div>
                                                        @enderror
                                                        @error('third_weight')
                                                        <div class="mt-3"><p class="text-red-500">{{$message}}</p></div>
                                                        @enderror
                                                    </div>

                                                    <div class="">
                                                        @error('first_rep')
                                                        <div class="mt-3"><p class="text-red-500">{{$message}}</p></div>
                                                        @enderror
                                                        @error('second_rep')
                                                        <div class="mt-3"><p class="text-red-500">{{$message}}</p></div>
                                                        @enderror
                                                        @error('third_rep')
                                                        <div class="mt-3"><p class="text-red-500">{{$message}}</p></div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                
                                        <table class="border w-full max-w-5xl border m-8
                                        placeholder:italic placeholder:text-slate-400 block bg-white  border border-slate-100 
                                        rounded-md py-4 pl-4 pr-4  shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 
                                        sm:text-sm max-h-max  table-auto">


                                        <tbody class="max-w-7xl w-full h-full rounded-md border block shadow-sm text-center 
                                        focus:outline-none focus:border-sky-500 sm:text-sm table-auto  focus:ring-1 border-slate-200" >
                                        
                                                <tr class="w-full  rounded-md h-14 border-separate border border-slate-400">
                                                    <th scope="col" class="w-1/6 border border-slate-200">重量(kg)</th>
                                                    <th scope="col" class="w-1/6 border border-slate-200">回数(rep)</th>
                                                </tr>

                                                <tr class="h-24">
                                                    <!-- weightカラム -->
                                                    <td class="px-6 py-4">
                                                    <input class="rounded-md h-10 border-separate border border-slate-300" type="number" placeholder="1set" step="0.5" inputmode="decimal" name="first_weight" value="{{old('first_weight')}}">
                                                    <label for="weight">:重量（kg）</label></td>
                                                    <!-- repカラム -->
                                                    <td class="px-6 py-4 h-24">
                                                    <input class="rounded-md h-10 border-separate border border-slate-300" type="number" placeholder="1set" step="0.5" name="first_rep" value="{{old('first_rep')}}">
                                                    <label for="rep">:回数（rep）</label></td>
                                                    @method('post')
                                                </tr> 

                                                <tr class="h-24">
                                                    <!-- weightカラム -->
                                                    <td class="px-6 py-4">
                                                    <input class="rounded-md h-10 border-separate border border-slate-300" type="number" placeholder="2set" step="0.5" name="second_weight" value="{{old('second_weight')}}">
                                                    <label for="weight">:重量（kg）</label></td>
                                                    <!-- repカラム -->
                                                    <td class="px-6 py-4">
                                                    <input class="rounded-md h-10 border-separate border border-slate-300" type="number" placeholder="2set" step="0.5" name="second_rep" value="{{old('second_rep')}}">
                                                    <label for="weight">:回数（rep）</label></td>
                                                    @method('post')
                                                </tr>    
                                            <tr class="h-24">
                                                    <!-- weightカラム -->
                                                    <td class="px-6 py-4">
                                                    <input class="rounded-md h-10 border-separate border border-slate-300" type="number" placeholder="3set" step="0.5" name="third_weight" value="{{old('third_weight')}}">
                                                    <label for="weight">:重量（kg）</label></td>
                                                    <!-- repカラム -->
                                                    <td class="px-6 py-4">
                                                    <input class="rounded-md h-10 border-separate border border-slate-300" type="number" placeholder="3set" step="0.5" name="third_rep" value="{{old('third_rep')}}">
                                                    <label for="weight">:回数（rep）</label></td>

                                                    @method('post')
                                            </tr>  
                                        </tbody>
                                    </table> 

                                <button type="submit" class="m-4 p-4 bg-sky-600 text-white w-full max-w-xs md:hover:bg-sky-300 bg-sky-600  hover:bg-sky-300 transition-colors">
                                    登録する
                                </button>
                </div>
        </form>