@extends('admin.layouts.guest')
@section('content')

<nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand mr-auto" href="#">Chat Application</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav">
                @guest

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('registration') }}">Register</a>
                </li>

                @else

                <li class="nav-item">
                    @if(Auth::user()->user_image != '')
                    <a class="nav-link" href="#"><b>Welcome <img src="{{ asset('images/' . Auth::user()->user_image ) }}" width="35" class="rounded-circle" />&nbsp; {{ Auth::user()->name }}</b></a>
                    @else
                    <a class="nav-link" href="#"><b>Welcome <img src="{{ asset('images/no-image.jpg') }}" width="35" class="rounded-circle" />&nbsp;{{ Auth::user()->name }}</b></a>
                    @endif
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li>

                @endguest
            </ul>

        </div>
    </div>
</nav>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-sm-4 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col col-md-6" id="chat_header"><b>Chat Area</b></div>
                        <div class="col col-md-6" id="close_chat_area"></div>
                    </div>
                </div>
                <div class="card-body" id="chat_area">
                    <h1>asasa</h1>

                </div>
            </div>
        </div>
    </div>
    <style>
        #chat_area {
            min-height: 500px;
        }

        h1 {
            margin-bottom: 0.5rem;
            font-family: "Roboto", sans-serif;
            font-weight: 700;
            line-height: 1.2;
            color: #161515;
        }

        #chat_history {
            min-height: 500px;
            max-height: 500px;
            overflow-y: scroll;
            margin-bottom: 16px;
            background-color: #ece5dd;
            padding: 16px;
            color: #343232 !important;
        }

        #user_list {
            min-height: 500px;
            max-height: 500px;
            overflow-y: scroll;
        }
    </style>




</div>

@endsection