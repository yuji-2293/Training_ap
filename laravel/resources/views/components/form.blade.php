<form action="{{ route('store') }}" method="POST">
    @csrf
    {{$slot}}
    <label for="sets">セット数:</label>
    <select name="sets" id="sets">
        <option value="1">1セット</option>
        <option value="2">2セット</option>
        <option value="3">3セット</option>
    </select>

    <label for="reps">回数:</label>
    <select name="reps" id="reps">
        @for ($i = 1; $i <= 20; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>

    <label for="weight">Kg:</label>
    <select name="weight" id="weight">
        @for ($i = 1; $i <= 200; $i++)
            <option value="{{ $i }}">{{ $i }} Kg</option>
        @endfor
    </select>

    <button type="submit">送信</button>
</form>