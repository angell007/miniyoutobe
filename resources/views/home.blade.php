@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <h4 class="text text-dark"> Ultimos videos ... </h4>
                <div class="text-center">
                    <a href class="btn btn-danger btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">
                        Nuevo video
                    </a>
                </div>

                <video-component></video-component>

            </div>
        </div>
    </div>
</div>
@include('video.create')
</div>
@endsection