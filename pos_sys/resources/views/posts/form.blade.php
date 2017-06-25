@extends('layouts.admin')

@section('title', 'Posts Form')

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

    <form action="{{ url('posts/form') }}" class="panel form-horizontal" method="post">
        {{ csrf_field() }}
        {{--{{ method_field('DELETE') }}--}}

        <div class="panel-heading">
            <span class="panel-title">Post form</span>
        </div>
        <div class="panel-body">
            <div class="row form-group">
                <label class="col-sm-4 control-label">Title:</label>
                <div class="col-sm-8">
                    <input type="text" name="title" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <label class="col-sm-4 control-label">description:</label>
                <div class="col-sm-8">
                    <input type="text" name="description" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <label class="col-sm-4 control-label">content:</label>
                <div class="col-sm-8">
                    <input type="text" name="content" class="form-control">
                </div>
            </div>

        </div>
        <div class="panel-footer text-right">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection