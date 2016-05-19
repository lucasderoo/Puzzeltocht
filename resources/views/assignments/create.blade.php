@extends('layouts.app')
<style>
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
.newbuttons{
    margin: 10px 0;
    float: left;
    width: 100%;
}
.midbuttons{
    margin: 0 51.5px 0 51.5px;
}
.leftbuttons{
    margin-right: 51.5px;
}
.rightbuttons{
    margin-left: 51.5px;
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
.newinputs input{
    margin: 7px 0;
}
.newinputs select{
    margin: 7px 0;
}
.newinputs input{
    width: 100%;
    height: 25px;
}
.radiobuts{
    width: 14px;
    float: right;
    margin-top: 175px;
    margin-left: 10px;
}
.radiobuts input{
    margin: 13px 0 !important;
}
.savebutton{
    width: 100%;
}
.questionA{
    margin-top: 32px;
}
.questionA select{
    
}
.answersA{
    margin-top: 32px;
}
.locationA{
    margin-top: 32px;
}
.questionI{
    margin-top: 32px;
}
.answersL{
    margin-top: 32px;
}
.locationI{
    margin-top: 32px;
}
.answersI {
    margin-top: 32px;
}
.questionI label{
    margin-top: 32px;
}
.answersL label{
    margin-top: 15px;
}
.locationI label{
    margin-top: 15px;
}
.newquestion{
    float: left;
    width: 100px;
    margin-top: 10px;
}
.newinputs{
    margin-top: 10px;
}
.locationI{
    margin-top: 30px;
}
textarea{
    height: 45px;
    width: 351px
}
</style>
@section('content')
<div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 middiv">
                <div class="newtripdiv">
                    <h1>Nieuwe opdracht</h1>
                    <div class="underlineH1"></div>
                    <div class="newassignment">
                        {!! Form::open(['method' => 'post', 'url' => '/home/opdrachten/store/' . $tripid .'/'.$prevurl]) !!}
                            <p> * zijn verplicht</p>
                        <div class="newquestion">
                            <p>Opdracht:</p>
                            <div class="questionL">
                                <label for="type">Type:</label><br>
                                <label for="title">Titel:</label><br>
                                <label for="question">Vraag:</label><br>
                            </div>
                            <p>Antwoorden:</p>
                            <div class="answersL">
                                <label for="answer_1">Antwoord 1:</label><br>
                                <label for="answer_2">Antwoord 2:</label><br>
                                <label for="answer_3">Antwoord 3:</label><br>
                            </div>
                            <p>Locatie:</p>
                            <div class="locationL">
                                <label for="longitude">Longitude:</label><br>
                                <label for="latitude">Latitude:</label>
                            </div>
                        </div>
                        <div class="newinputs">
                            <div class="questionI">
                                <select id="type" name="type">
                                    <option value="question">Vraag</option>
                                    <option value="Type2">Type2</option>
                                    <option value="Type3">Type3</option>
                                    <option value="Type4">Type4</option>
                                </select>
                                <input question="" maxlength="100" required="required" name="title" type="text" id="title"><br>
            <textarea rows="2" question="" maxlength="100" required="required" name="question" id="question"></textarea><br>
                            </div>
                            <div class="answersI">
                                <input question="" maxlength="100" required="required" name="answer_1" type="text" id="answer_1"><br>                         
                                <input question="" maxlength="100" required="required" name="answer_2" type="text" id="answer_2"><br>                      
                                <input question="" maxlength="100" required="required" name="answer_3" type="text" id="answer_3"><br>
                            </div>
                            <div class="locationI">                   
                                <input question="" maxlength="100" name="longitude" type="text" id="longitude"><br>
                                <input question="" maxlength="100" name="latitude" type="text" id="latitude">
                            </div>
                        </div>
                        <div class="radiobuts">
                            <input checked="checked" name="correct_answer" type="radio" value="answer_1">
                            <input name="correct_answer" type="radio" value="answer_2">
                            <input name="correct_answer" type="radio" value="answer_3">
                        </div>
                    {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



