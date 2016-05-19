<!DOCTYPE html>
<html>
<head>
    <title>{{$assignments->title}} - Aanpassen</title>
</head>
<body>
       {!! Form::open(['method' => 'get', 'url' => '/home/opdrachten/update/' . $id .'/'. $tripid . '/' .$prevurl]) !!}
        {!! Form::label('type', 'Type:') !!}
        {!! Form::select('type', [
       'question' => 'Vraag',
       'Type2' => 'Type2',
       'Type3' => 'Type3',
       'Type4' => 'Type4']
        ) !!}<br>
        {!! Form::label('title', 'Titel:') !!}
        {!! Form::text('title', $assignments->title, array('question' => '','maxlength' => 100,'required' => 'required' )) !!}<br>
        {!! Form::label('question', 'Vraag:') !!}
        {!! Form::text('question', $assignments->question, array('question' => '','maxlength' => 100,'required' => 'required' )) !!}<br>
        <div style="float: left;">
        {!! Form::label('answer_1', 'Antwoord 1:') !!}
        {!! Form::text('answer_1', $assignments->answer_1, array('question' => '','maxlength' => 100,'required' => 'required' )) !!}<br>
        {!! Form::label('answer_2', 'Antwoord 2:') !!}
        {!! Form::text('answer_2', $assignments->answer_2, array('question' => '','maxlength' => 100,'required' => 'required' )) !!}<br>
        {!! Form::label('answer_3', 'Antwoord 3:') !!}
        {!! Form::text('answer_3', $assignments->answer_3, array('question' => '','maxlength' => 100,'required' => 'required' )) !!}<br>
        {!! Form::label ('longitude' , 'Longitude:') !!}
        {!! Form::text('longitude', null, array('question' => '','maxlength' => 100)) !!}<br>
        {!! Form::label ('latitude' , 'Latitude:') !!}
        {!! Form::text('latitude', null, array('question' => '','maxlength' => 100)) !!}
        </div>
        <div style="float :left; width: 20px;">
        {!! Form::radio('correct_answer','answer_1',true ) !!}
        {!! Form::radio('correct_answer','answer_2') !!}
        {!! Form::radio('correct_answer','answer_3') !!}
        </div>
        {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
    {!! Form::close() !!}


</body>
</html>