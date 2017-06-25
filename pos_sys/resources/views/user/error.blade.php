@extends('layouts.admin')

@section('title', 'Error Form')

@section('content')
    <meta http-equiv="refresh" content="2;URL='{{url('/user')}}'" />

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection