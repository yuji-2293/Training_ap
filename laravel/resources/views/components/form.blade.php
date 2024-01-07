<form action="{{ route('store') }}" method="POST" autocomplete="off">
    @csrf
    {{$slot}}

    <label for="sets">セット数:</label>
    <div class="relative inline-block w-32">
        <select name="sets" id="sets" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500
         px-4 py-2 pr-8 rounded shadow leading-tight focus:border-rose-500 focus:ring-rose-500" autocomplete="off">
        <option value="1" {{ (session('formInput.sets') == 1) ? 'selected' : '' }}>1セット</option>
        <option value="2" {{ (session('formInput.sets') == 2) ? 'selected' : '' }}>2セット</option>
        <option value="3" {{ (session('formInput.sets') == 3) ? 'selected' : '' }}>3セット</option>
    </select>
    </div>

    <label for="weight">セットの重さ（Kg）:</label>
    <div class="relative inline-block w-32">
     <select name="weight" id="weight" class=" px-4 py-2 pr-8 block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500
      rounded shadow leading-tight focus:outline-none focus:border-rose-500 focus:ring-rose-500" autocomplete="off">
        @for ($weight = 0; $weight <= 150; $weight+=5)
            <option value="{{ $weight }}">{{ $weight }} Kg</option>
        @endfor
     </select>
    </div>


    <label for="rep">セットの回数:</label>
    <div class="relative inline-block w-32">
    <select name="rep" id="rep" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8
    rounded shadow leading-tight focus:outline-none focus:border-rose-500 focus:ring-rose-500" autocomplete="off">
        @for ($n = 1; $n <= 20; $n++)
            <option value="{{ $n }}">{{ $n }}</option>
        @endfor
    </select>
    </div>
    <input type="hidden" name="other_user_id" value="{{ Auth::user()->id }}">

    <button class="inline-block p-2 bg-rose-500 rounded-lg shadow  text-white max-w-xs md:hover:bg-sky-300  hover:bg-sky-300 transition-colors" type="submit">共有する</button>
</form>
