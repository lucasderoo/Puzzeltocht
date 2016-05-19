<!DOCTYPE html>
<html>
<head>
	<title>dasd</title>
</head>
<body>
	<h1>{{ $tripname}}</h1>
	<?php if ($assignments == "") : ?>
		<div>
			<h1>No data found!</h1>
		</div>
	<?php else : ?>
	<table>
		<tr>
			<th>ID</th>
			<th>Vraag</th>
			<th>Antwoord 1</th>
			<th>Antwoord 2</th>
			<th>Antwoord 3</th>
			<th>Goede antwoord</th>
			<th>Laatst geupdate</th>
			<th>gecreëerd</th>
		</tr>
		<tdbody>
			@foreach ($assignments as $assignment)
		<tr>
			<td>{{ $assignment->id }}</td>
			<td>{{ $assignment->question }}</td>
			<td>{{ $assignment->answer_1 }}</td>
			<td>{{ $assignment->answer_2 }}</td>
			<td>{{ $assignment->answer_3 }}</td>
			<td>{{ $assignment->correct_answer }}</td>
			<td>{{ $assignment->updated_at }}</td>
			<td>{{ $assignment->created_at }}</td>
		</tr>
			@endforeach
		</tdbody>
	</table>
<?php endif; ?>
</body>
</html>