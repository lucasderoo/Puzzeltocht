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
.underlineH1{
    width: 100%;
    height: 1px;
    background-color: #999999;
}
.top-table table{
    width: 100%;
}

.midtable{
    float: left;
    margin-top: 15px;
}
th{
    text-align: center;
}
td{
    text-align: center;
}
.newtripdiv{
    width: 500px;
    margin: 10px auto;
}
.newtripdiv h1{
    text-align: center;
}
.tripnameinput{
    width: 300px;
    margin: auto;
}
.tripnameinput input{
    width: 220px;
}
.newbuttons{
    margin: 10px auto;
    max-width: 924px;
}
.midbuttons{
    margin: 0 45px 0 45px;
}
.leftbuttons{
    margin-right: 45px;
}
.rightbuttons{
    margin-left: 45px;
}
td{
    padding: 10px;
}
.newassignment{
    width: 474px;
    margin: auto;
    margin-top: 10px;
}
.newlabels{
    width: 100px;
    float: left;
}
.newlabels label{
    margin: 7px 0;
    height: 25px;
}
.newinputs{
    width: 350px;
    float: left;
}
.newinputs input,select{
    margin: 7px 0;
}
.newinputs input{
    width: 100%;
    height: 25px;
}
.radiobuts{
    width: 14px;
    float: right;
    margin-top: 111px;
    margin-left: 10px;
}
.radiobuts input{
    margin: 13px 0;
}
.savebutton{
    width: 100%;
}
</style>
@section('content')
<div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 middiv">
                    <div class="newtripdiv">
                        <h1>Nieuwe Tocht</h1>
                    <div class="tripnameinput">
                        {!! Form::open(['method' => 'post', 'url' => '/home/tochten/store/'. $tripid]) !!}
                        <label>Tochtnaam:</label>
                        <input type="text" name="">
                    </div>
                    </div>
                        <div class="underlineH1"></div>
                        <div class="newbuttons">
                            <a class="btn btn-primary leftbuttons" href="/home/opdrachten/create/{{$tripid}}" role="button">Nieuwe vraag</a>
                            <a class="btn btn-primary midbuttons" href="#" role="button">Nieuwe ??????</a>
                            <a class="btn btn-primary midbuttons" href="#" role="button">Nieuwe ??????</a>
                            <a class="btn btn-primary midbuttons" href="#" role="button">Nieuwe ??????</a>
                            <a class="btn btn-primary rightbuttons" href="/home/opdrachten/connect/{{$tripid}}" role="button">Alle opdrachten</a>
                        </div>
                        <div class="underlineH1"></div>
                         <?php if ($assignments == "") : ?>
                            <div class="no-data">
                                <h1>No data found!</h1>
                            </div>
                        <?php else : ?>
                        <div class="top-table">
                            <table class="table-striped midtable">
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
                                <td><a class="{{{ $classname }}}" href="{{url('/home/opdrachten/active',$assignment->id)}}">{{{ $text }}}</a></td>
                            </tr>
                            @endforeach
                            </tdbody>
                        </table>
                        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                        {!! Form::close() !!}
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection