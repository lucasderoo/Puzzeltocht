<?php 
    if (Auth::guest()) {
        $role = "";
    }
    elseif(Auth::user()->role == "1"){
        $role = "Beheerder";
    }
    elseif(Auth::user()->role == "2"){
        $role = "Deelnemer";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/topnavbar.css" rel='stylesheet' type='text/css'>
    <link href="/css/login.css" rel='stylesheet' type='text/css'>
    <link href="/css/simple-sidebar.css" rel="stylesheet">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/tables.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}


    <!--JS-->
    <script src="/js/jquery-1.12.4.min.js"></script>

    <style>
        body{
            font-family: 'Lato';
        }
        .fa-btn {
            margin-right: 6px;
        }
        a{
            text-decoration: none !important;
        }
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
        .tocht {
            float: right;
            padding-bottom: 9px;
            margin: 25px 0 20px;
            margin-bottom: 10;
        }
        .rolelink{
            padding: 15px 15px;
            font-size: 13px;
            line-height: 20px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @if(Auth::guest())
                    <a class="navbar-brand" href="/home">Puzzeltocht</a>
                @else
                    <a class="navbar-brand" href="/home">Puzzeltocht (<?php echo Auth::user()->name ?>:{{$role}})</a>
                @endif
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="/login">Login</a></li>
                @elseif (Auth::user()->role == '1')
                    <li><a href="/home/tochten">Tochten</a></li>
                    <li><a href="/home/starttrip">Tochten starten</a></li>
                    <li><a href="/home/opdrachten">Opdrachten</a></li>
                    <li><a href="/register">Register</a></li>
                @elseif (Auth::user()->role == '2')
                    <li><a href="/home/starttrip">Tochten starten</a></li>
                @endif
                @if (Auth::user())
                    <li><a href="/logout">Logout</a></li>
                @endif
                </ul>
            </div>
        </div>
    </nav>
@yield('content')
