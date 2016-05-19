<style>
#green_answer{
	display: none;
} 
#green{
	color: green;
}
#correct_answer{
	display: none;
}


</style>
<!DOCTYPE html>
<html>
<head>
	<title>fe;sljfoiesHFljsHlfukhd</title>
<body>
	 {!! Form::open(['method' => 'post', 'url' => '/home/opdrachten/destroy/' . $id .'/'. $tripid . '/' .$prevurl]) !!}
<div>
	<p>Id: {{ $assignment->id }}</p>
	<p>Type: {{ $assignment->type }}</p>
	<p>Titel: {{ $assignment->title }}</p>
	<p>Vraag: {{ $assignment->question }}</p>
	<p id="answer1">{{ $assignment->answer_1 }}</p>
	<p id="answer2">{{ $assignment->answer_2 }}</p>
	<p id="answer3">{{ $assignment->answer_3 }}</p>
	<p>Locatie: {{ $assignment->location }}</p>
	<p id="correct_answer">{{ $assignment->correct_answer }}</p>
	<p>Laatst geupdate: {{ $assignment->updated_at }}</p>
	<p>gecreerd: {{ $assignment->created_at }}</p>
</div>
	{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
<script>
	var green_answer = document.getElementById('correct_answer').innerHTML;
	console.log(green_answer);
	if(green_answer == "answer_1"){
		answer1.id = "green";
	}
	else if(green_answer == "answer_2"){
		answer2.id = "green";
	}
	else if(green_answer == "answer_3"){
		answer3.id = "green";
	}

</script>
</body>
</html>

