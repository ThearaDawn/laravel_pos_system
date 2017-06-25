@extends('layouts.admin')

@section('title', 'Posts List')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Default tables</span>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th><a href="{{ url('posts/form') }}">Add</a></th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($posts as $row)
                        <tr>
                            <td>Edit</td>
                            <td>{{$row->id}}</td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->description}}</td>
                        </tr>
                    @endforeach


                </tbody>
            </table>

            {{ $posts->links() }}

        </div>
    </div>
@endsection
