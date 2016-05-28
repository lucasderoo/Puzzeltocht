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
                </tr>
            <tbody>
            @foreach($users as $user)
            <tr>
            	<th>{{ $user->name }}</th>
            	<td><input type="checkbox" name="connect[]" value="{{$user->id}}"></td>
            </tr>
            </tbody>
            </table>
            @endforeach
            {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection