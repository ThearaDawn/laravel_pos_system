@extends('layouts.admin')

@section('title', 'Users List')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Users List</span>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th><a  href="{{ url('user/form') }}" class="btn btn-xs btn-labeled btn-info">Add</a></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>E-mail</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($users as $row)
                    <tr>
                        <td width="100">
                            <div class="row">
                                <div class="col-md-5">
                                    <form action="{{ url("/user/form/{$row->id}") }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <button class="btn btn-xs btn-labeled btn-success">Edit</button>
                                    </form>
                                </div>
                                <div class="col-md-5">
                                    <form action="{{ url("/user/form/{$row->id}") }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button  class="btn btn-xs btn-labeled btn-danger my-del">Del.</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td>{{$row->id}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                    </tr>
                @endforeach


                </tbody>
            </table>

            {{ $users->links() }}

        </div>
    </div>
@endsection

@section('script')
   <script>
       $(function(){
           $('body').delegate('.my-del','click',function(){
               if(!confirm('Are you sure delete this??')){
                   return false;
               }
           });
       });
   </script>
@endsection
