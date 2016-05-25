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
    <!--<link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="/css/tables.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

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
    </style>
</head>
<body id="app-layout">
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
            @if (Auth::guest())
            <li class="sidebar-brand">
                <a href="/home">
                    Puzzeltocht
                </a>
            </li>
            <li>
                <a href="/login">Login</a>
            </li>
            <li>
                <a href="/home">Home</a>
            </li>
            @elseif (Auth::user()->role == '1')
            <li class="sidebar-brand">
                <a href="/home">
                    Puzzeltocht (ADMIN)
                </a>
            </li>
            <li>
                <a href="/home">Home</a>
            </li>
            <li>
                <a href="/home/tochten">Tochten</a>
            </li>
            <li>
                <a href="/home/opdrachten">Opdrachten</a>
            </li>
            <li>
                <a href="/home/starttrip">Start tocht</a>
            </li>
            <li>
                <a href="/logout">Logout</a>
            </li>
            <li>
                <a href="/register">Register</a>
            </li>
            @elseif (Auth::user()->role == '2')
            <li class="sidebar-brand">
                <a href="/home">
                    Puzzeltocht (SUPERUSER)
                </a>
            </li>
            <li>
                <a href="/home">Home</a>
            </li>
            <li>
                <a href="/logout">Logout</a>
            </li>
            <li>
                <a href="/home/starttrip">Tochten</a>
            </li>   
            @elseif (Auth::user()->role == '3')
            <li class="sidebar-brand">
                <a href="/home">
                    Puzzeltocht (DEELNEMER)
                </a>
            </li>
            <li>
                <a href="/home">Home</a>
            </li>
            <li>
                <a href="/logout">Logout</a>
            </li>
            <li>
                <a href="/home/starttrip">Speel tochten</a>
            </li>        
            @endif
            </ul>
        </div>
@yield('content')
