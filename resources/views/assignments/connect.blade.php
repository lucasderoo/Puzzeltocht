@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="{{url('home/opdrachten/create')}}">Nieuwe Vraag</a>
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
						{!! Form::open(['method' => 'post', 'url' => '/home/opdrachten/connectassignments/'. $tripid . '/' .$prevurl]) !!}
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
							<td><input type="checkbox" name="connect[]" value="{{$assignment->id}}"></td>
						</tr>
							@endforeach
						</tdbody>
					</table>
					{!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
