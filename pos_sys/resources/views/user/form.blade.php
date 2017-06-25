@extends('layouts.admin')

@section('title', 'User Form')

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ url('user/form') }}"  enctype="multipart/form-data"
          class="panel form-horizontal" method="post">
        {{ csrf_field() }}

        @if( $row != null)
            {{ method_field('PATCH') }}
        @endif

        <input type="hidden" name="id" value="{{$row!=null?$row->id:0}}">
        <div class="panel-heading">
            <span class="panel-title">User form</span>
        </div>
        <div class="panel-body">
            <div class="row form-group">
                <label class="col-sm-2 control-label">Name:</label>
                <div class="col-sm-10">
                    <input type="text" value="{{$row!=null?$row->name:''}}" name="name" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <label class="col-sm-2 control-label">E-mail:</label>
                <div class="col-sm-10">
                    <input type="email" value="{{$row!=null?$row->email:''}}"  name="email" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <label class="col-sm-2 control-label">Password:</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <label class="col-sm-2 control-label">Password Confirmation:</label>
                <div class="col-sm-10">
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <label class="col-sm-2 control-label">Image:</label>
                <div class="col-sm-10">
                    <input type="file" name="image" class="form-control">
                </div>
            </div>


        </div>
        <div class="panel-footer text-right">
            <button class="btn btn-success">Submit</button>
            <a href="{{url()->previous()}}" class="btn btn-info">Back</a>
        </div>
    </form>
@endsection