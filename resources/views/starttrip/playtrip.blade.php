@extends('layouts.app')


@section('content')
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 middiv">
            <p>Vraag {{ $number }}/{{ $count }}</p>
            <p>Score: {{ $score }}</p>
            {!! Form::open(['method' => 'post', 'url' => '/home/starttrip/tripscore/' . $tripid .'/' .$number]) !!}
            @foreach($item as $question)
            <p>{{ $question->type }}</p>
            <p>{{ $question->question }}</p>
            <p>{{ $question->answer_1 }}</p>
            <label><input type="radio" name="answer" value="answer_1"></label>
            <p>{{ $question->answer_2 }}</p>
            <label><input type="radio" name="answer" value="answer_2"></label>
            <p>{{ $question->answer_3 }}</p>
            <label><input type="radio" name="answer" value="answer_3"></label> 
            @endforeach
            {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>





@endsection