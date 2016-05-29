@extends('layouts.app')



@section('content')
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 middiv">
            {!! Form::open(['method' => 'post', 'url' => '/home/starttrip/storeteams/' . $tripid]) !!}
            <label for="teamname">Teamnaam:</label>
            <input  maxlength="100" name="teamname" type="text">
            <table class="table-striped midtable">
                <tr>
                    <th>Naam:</th>
                    <th>Koppel:</th>
                </tr>
            <tbody>
            @foreach($users as $user)
            <tr>
            	<td>{{ $user->name }}</td>
            	<td><input type="checkbox" name="connect[]" value="{{$user->id}}"></td>
            </tr>
            </tbody>
            @endforeach
            </table>
            {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection