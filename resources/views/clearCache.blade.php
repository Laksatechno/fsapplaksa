<!-- resources/views/clearCache.blade.php -->

@extends('layouts.master')
@section('content')
    @include('layouts.topNavBack')
    <div class="container">
        <div class="card">
            <b class="card-title">Clear Cache Aplikasi Hanya dilakukan ketika aplikasi mengalami Error!!</b>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div></br>
        @endif
    <form method="POST" action="{{ route('clear.view.cache') }}">
        @csrf
        <button type="submit" class="btn btn-primary" >Clear View Cache </button>
    </form></br>

    <form method="POST" action="{{ route('clear.route.cache') }}">
        @csrf
        <button type="submit" class="btn btn-primary" >Clear Route Cache</button>
    </form></br>

    <form method="POST" action="{{ route('clear.config.cache') }}">
        @csrf
        <button type="submit" class="btn btn-primary ">Clear Config Cache</button>
    </form></br>

    <form method="POST" action="{{ route('clear.all.cache') }}">
        @csrf
        <button type="submit" class="btn btn-primary" >Clear All Caches</button>
    </form>
        </div>
    </div>
    @endsection
