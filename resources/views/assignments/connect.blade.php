@extends('layouts.app')

@section('content')
<stlye>



</stlye>
<div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 middiv">
                	<div class="tablediv">
	                    <h1>Opdrachten koppelen</h1>
	                    <a class="btn btn-primary backbutton">Terug</a>
	                    <div class="underlineH1"></div>
	                 	{!! Form::open(['method' => 'post', 'url' => '/home/opdrachten/connectassignments/'. $tripid . '/' .$prevurl]) !!}
						<table class="table-striped midtable">
	                        <tr>
	                            <th>Type</th>
	                            <th>Titel</th>
	                            <th>kenmerk</th>
	                            <th>Koppel</th>
	                        </tr>
	                        <tdbody>
	                        @foreach ($assignments as $assignment)
	                        <tr>
	                            <td>{{ $assignment->type }}</td>
	                            <td>{{ $assignment->title }}</td>
	                            <?php 
	                                $questions = $assignment->question;
	                                $maxquestions = substr($questions, 0, 10);
	                            ?>
	                            <td>{{{ $maxquestions }}} ...</td>
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
</div>

@endsection
