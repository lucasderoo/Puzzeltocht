@extends('layouts.app')
<style>
a{
    text-decoration: none !important;
}
.top{
    width: 100%;
    height: 100px;
    border-bottom: 1px solid black;
}
.TopInput{
    margin-left: auto;
    margin-right: auto;
    width: 235px;
}
.top h1{
    text-align: center;
}
.midtop{
    width: 100%;
    border-bottom: 1px solid black;
}
.midtopbuttons{
    width: 800px;
    margin: 10px auto;
}
.midtop a{
    display: inline-block;
}
.midtop a{
    margin-left: 31px;
    margin-right: 31px;
}
.DataTR{
    height: 70px;
}
th{
    width: 120px;
}
td{
    text-align: center;
    padding: 10px !important;
}
th{
    text-align: center !important;
}
.clickable-row:hover{
    background-color: white;
    opacity: 0.8;
    cursor: pointer;
}
.no-data{
    text-align: center;
}
table{
    margin: 10 auto;
}
}
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div>
                      {!! Form::open(['method' => 'post', 'url' => '/home/tochten/store/'. $tripid]) !!}
                    </div>
                    <div class="top">
                        <h1>Nieuwe tocht</h1>
                        <div class="TopInput">
                            {!! Form::label('Tripname', 'Tochtnaam:') !!}
                            {!! Form::text('tripname', $tripname, array('maxlength' => 100,'required' => 'required' )) !!}
                        </div>
                    </div>

                    <div class="midtop">
                        <div class="midtopbuttons">
                            <a href="/home/opdrachten/create/{{$tripid}}">Nieuwe vraag</a>
                            <a href="">Nieuwe ????</a>
                            <a href="">Nieuwe ????</a>
                            <a href="">Nieuwe ????</a>
                            <a href="/home/opdrachten/connect/{{$tripid}}">Alle opdrachten</a>
                        </div>
                    </div>
                    <div class="midmid">
                    <?php if ($assignments == "") : ?>
                            <div class="no-data">
                                <h1>No data found!</h1>
                            </div>
                    <?php else : ?>
                    <table class="table-striped">
                            <tr>
                                <th>Type</th>
                                <th>Titel</th>
                                <th>kenmerk</th>
                                <th>Aanpassen</th>
                                <th>Verwijderen</th>
                                <th>Active</th>
                            </tr>
                        <script>
                        jQuery(document).ready(function($) {
                        $(".clickable-row").click(function() {
                            window.document.location = $(this).data("href");
                        });
                        });
                        </script>
                            <tdbody>
                            @foreach ($assignments as $assignment)
                            <tr class='clickable-row DataTR' data-href="/home/opdrachten/show/{{$assignment->id}}/{{$tripid}}">
                                <td>{{ $assignment->type }}</td>
                                <td>{{ $assignment->title }}</td>
                                <?php 
                                    $questions = $assignment->question;
                                    $maxquestions = substr($questions, 0, 10);
                                ?>
                                <td>{{{ $maxquestions }}} ...</td>
                                <td><a href="/home/opdrachten/edit/{{$assignment->id}}/{{$tripid}}" class="btn btn-info">Edit</a></td>
                                <td><a href="/home/opdrachten/delete/{{$assignment->id}}/{{$tripid}}" class="btn btn-danger">Delete</a></td>
                                <?php 
                                    if($assignment->active == "N"){
                                        $text = "Not active";
                                        $classname = "btn btn-danger";
                                    }
                                    else{
                                        $text = "Active";
                                        $classname = "btn btn-success";
                                    }
                                ?>
                                <td><a class="{{{ $classname }}}" href="/home/opdrachten/active/{{$assignment->id}}">{{{ $text }}}</a></td>
                            </tr>
                            @endforeach
                            </tdbody>
                    </table>
                    <?php endif; ?>
                    </div>    
                        {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection