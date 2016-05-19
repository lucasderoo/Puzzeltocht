<!DOCTYPE html>
<html>
<head>
	<title>Delete tocht</title>
<body>
	 {!! Form::open(['method' => 'post', 'url' => '/home/tochten/destroy/' .$id]) !!}
<div>
	<p>Id: {{ $trip->id }}</p>
	<p>tripnaam: {{ $trip->tripname }}</p>
	<p>gekoppelde opdrachten: {{ $trip->assignments }}</p>
	<p>Laatst geupdate: {{ $trip->updated_at }}</p>
	<p>gecreerd: {{ $trip->created_at }}</p>
</div>
	{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
</body>
</html>

