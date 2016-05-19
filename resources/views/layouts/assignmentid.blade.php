<div id="new-assignmentid">
    <select>  
        @foreach ($assignments as $assignment)
            <option value="{{ $assignment->id }}">{{ $assignment->id }} : {{ $assignment->question }} </option>
        @endforeach
    </select>
</div>