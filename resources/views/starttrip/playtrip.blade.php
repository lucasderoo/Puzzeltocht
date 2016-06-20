@extends('layouts.app')

<style>
.jumbotron{
    background-color:#2E2D88;
    color:white;
}

.form-control {
     width: 60%;
     margin-bottom: 5px; 
}

.button{
    width: 100%;
    float: left;
}

.navbar
{
  border-radius: 0 !important;
}

.button h1{
    float: left;
}

.tocht{
    float: right;
    padding-bottom: 9px;
    margin: 25px 0 20px;
    margin-bottom: 10;
}

.navbar-default{
  background-color: #337ab7;
  border-color: #2e6da4;
}

.navbar-default .navbar-brand {
  color: #fff;
}

.navbar-default .navbar-brand:hover,
.navbar-default .navbar-brand:focus {
  color: #5E5E5E;
}

.navbar-default .navbar-nav > li > a {
    color: #fff;
}

.navbar-default .navbar-toggle {
  border-color: #fff
}

.navbar-default .navbar-toggle .icon-bar {
    background-color: #fff;
}

.btn-default{
    margin-bottom: 15px;
}

.btn-1{
    float: right;
    margin-top: 10px;
    margin-right: 10px;
    margin-bottom: 10px;
}

.buttons{
    margin-top: 30px;
}

.page-header-2{
    margin-top: 10px;
}

.title h4{
    margin-bottom: 25px;
}
.modalDialog {
  position: fixed;
  font-family: Arial, Helvetica, sans-serif;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: rgba(0,0,0,0.8);
  z-index: 99999;
  opacity:0;
  -webkit-transition: opacity 400ms ease-in;
  -moz-transition: opacity 400ms ease-in;
  transition: opacity 400ms ease-in;
  pointer-events: none;
}
.modalDialog:target {
  opacity:1;
  pointer-events: auto;
}

.modalDialog > div {
  width: 400px;
  position: relative;
  margin: 10% auto;
  padding: 5px 20px 13px 20px;
  border-radius: 10px;
  background: #fff;
  background: -moz-linear-gradient(#fff, #999);
  background: -webkit-linear-gradient(#fff, #999);
  background: -o-linear-gradient(#fff, #999);
}
.close {
  background: #606061;
  color: #FFFFFF;
  line-height: 25px;
  position: absolute;
  right: -12px;
  text-align: center;
  top: -10px;
  width: 24px;
  text-decoration: none;
  font-weight: bold;
  -webkit-border-radius: 12px;
  -moz-border-radius: 12px;
  border-radius: 12px;
  -moz-box-shadow: 1px 1px 3px #000;
  -webkit-box-shadow: 1px 1px 3px #000;
  box-shadow: 1px 1px 3px #000;
}

.close:hover { background: #00d9ff; }

</style>
@section('content')

<div class="container">
 <div class="page-header">
    <h1>Opdracht</h1>
 </div>

<div class="text">
    <p>Vraag: {{ $number }}/{{ $count }}</p>
    <p>Score: {{ $score }}</p>
</div>

<a href="#openModal">QR code</a>

<div class="page-header page-header-2">
</div>

{!! Form::open(['method' => 'post', 'url' => '/home/starttrip/tripscore/' . $tripid .'/' .$number]) !!}
@foreach($item as $question)
<div class="title">
    <h4>{{ $question->question }}</h4>
</div>

<div id="openModal" class="modalDialog">
  <div>
    <a href="#close" title="Close" class="close">X</a>
    <div class="center" id="reader" style="width:300px;height:250px;"></div>
  </div>
</div>

<div class="Antwoorden">
<div class="Antwoord1">
  <label><input type="radio" name="answer" value="answer_1" checked><span>{{ $question->answer_1 }}</span></label>
</div>
<div class="Antwoord2">
  <label><input type="radio" name="answer" value="answer_2">{{ $question->answer_2 }}</label>
</div>
<div class="Antwoord3">
  <label><input type="radio" name="answer" value="answer_3">{{ $question->answer_3 }}</label>
</div>
</div>
@endforeach
<div class="buttons">
 <a href="/home/starttrip/start/{{$tripid}}" class="btn btn-danger">Stop</a>
 <button href="#" class="btn btn-primary">Next</button>
</div>

</div>

</body>

</html>
 @endsection