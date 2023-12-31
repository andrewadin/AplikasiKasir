<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = User::all();
        return view('layouts/users',[ 'users' => $users ]);
    }

    public function add(){
        return view('layouts/add-user');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'level' => 'required|string|min:4',
        ]);

        User::updateOrCreate([
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'level' => $data['level'],
        ]);

        return redirect('/users');
    }

    public function edit($id){
        $users = User::find($id);
        return view('layouts/edit-user',['users' => $users]);
    }

    public function update(Request $request,$id){
        User::updateOrCreate([
            'id' => $id],
            ['name' => $request->name,
            'level' => $request->level,
        ]);

        return redirect('/users');
    }

    public function forgotpsw($id){
        $users = User::find($id);
        return view('layouts/forgotpsw', ['users' => $users]);
    }

    public function changepsw(Request $request, $id){
        $data = $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::updateOrCreate([
            'id' => $id],
            ['password' => $data['password'],
        ]);

        return redirect('/users');
    }

    public function delete(Request $request ,$id){
        User::where('id', $request->id)->delete();
        return redirect('/users');
    }
}
