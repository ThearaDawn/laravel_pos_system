<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use Validator;

use Carbon\Carbon;


class UserController extends Controller
{
    function signin()
    {
        return view('user.signin');
    }

    function post_signin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $user = DB::table('users')->where('email', $request->input('email'))->first();

        if($user != null){

            if (Hash::check($request->input('password'), $user->password)) {
                return redirect('/user');
            }

        }
        return redirect('/signin');
    }

    function signout()
    {
        return redirect('/signin');
    }


    function index()
    {
        $users = DB::table('users')->paginate(2);

        return view('user.index',['users' => $users]);
    }

    function form()
    {
        return view('user.form',['row'=>null]);
    }

    function insert(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required|min:5',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // for insert to db
        $img_url = '';

        // save img
        if($request->image != null) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/users'), $imageName);
            $img_url = $imageName;
        }

        DB::table('users')->insert(
            [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'img_url' => $img_url,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'password' =>Hash::make($request->input('password'))
            ]
        );

        return redirect('/user');
    }

    function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'min:5|confirmed',
            'password_confirmation' => 'min:5',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return  redirect('/user/error')
                ->withErrors($validator)
                ->withInput();
        }

        $img_url = '';
        if($request->image != null) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/users'), $imageName);
            $img_url = $imageName;
        }

        $data = array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'updated_at' => Carbon::now(),
            'img_url' => $img_url,
            'password' => Hash::make($request->input('password'))
        );

        if($img_url == '') {
            unset($data['img_url']);
        }

        if($request->input('password') == '') {
            unset($data['password']);
        }

        DB::table('users')->where('id', $request->input('id'))
            ->update($data);


        return redirect('/user');
    }

    function edit($id)
    {
        $row = DB::table('users')->where('id', $id)->first();
        return view('user.form',['row'=>$row]);
    }

    function delete($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back();
    }

    function error()
    {
        return view('user.error');
    }
}
