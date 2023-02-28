@extends('admin.layouts.guest')
@section('content')
<style>
    body {
        margin-top: 20px;
        color: #1a202c;
        text-align: left;
        background-color: #e2e8f0;
    }

    .main-body {
        padding: 15px;
    }

    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
    }

    .btn {
        color: #fff;
        background-color: #EB1616;
        border-color: #EB1616;
    }
</style>
<div class="col-sm-12 col-xl-9">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">User Profile</h6>
        <div class="container">
            <div class="main-body">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4>{{$getDetails->name}}</h4>
                                        <p class="text-secondary mb-1">Full Stack Developer</p>
                                        <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <!-- <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div> -->
                                    <div class="col-sm-9 text-secondary">
                                        {{$getDetails->name ?? ''}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <!-- <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div> -->
                                    <div class="col-sm-9 text-secondary">
                                        {{$getDetails->email ?? ''}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <!-- <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div> -->
                                    <div class="col-sm-9 text-secondary">
                                        {{$getDetails->phone ?? ''}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <!-- <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div> -->
                                    <div class="col-sm-9 text-secondary">
                                        {{$getDetails->address ?? ''}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a class="btn btn-info" href="{{route('edit.profile',$getDetails->id)}}">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection