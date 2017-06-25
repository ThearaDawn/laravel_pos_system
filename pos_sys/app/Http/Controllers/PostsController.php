<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class PostsController extends Controller
{
    function index()
    {
        $posts = DB::table('posts')->paginate(2);

        return view('posts.index',['posts' => $posts]);
    }

    function form()
    {
        return view('posts.form');
    }

    function insert(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        DB::table('posts')->insert(
            [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'content' => $request->input('content')
            ]
        );

        return redirect('/posts');
    }

    function edit()
    {

    }


}
