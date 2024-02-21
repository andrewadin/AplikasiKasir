<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $rules = array(
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        );

        $messages = array(
            'name.required' => 'Nama harus diisi',
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username sudah ada',
            'password.required' => 'Password harus diisi',
            'password.confirmed' => 'Password tidak sama dengan konfirmasi password',
            'password.min' => 'Password harus lebih dari 6 karakter'
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails())
        {
            return redirect('users/add')
            ->withErrors($validator);
        }

        User::updateOrCreate([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'type' => $request->type,
        ]);

        return redirect('/users')->with('alert','Penambahan user berhasil');
    }

    public function edit($id){
        $users = User::find($id);
        return view('layouts/edit-user',['users' => $users]);
    }

    public function update(Request $request,$id){
        $rules = array(
            'name' => 'required|string|max:255',
        );

        $messages = array(
            'name.required' => 'Nama harus diisi',
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails())
        {
            return redirect('users/edit/'.$id)
            ->withErrors($validator);
        }

        User::updateOrCreate([
            'id' => $id],
            ['name' => $request->name,
            'type' => $request->type,
        ]);

        return redirect('/users')->with('alert','Pengubahan user berhasil');
    }

    public function forgotpsw($id){
        $users = User::find($id);
        return view('layouts/forgotpsw', ['users' => $users]);
    }

    public function changepsw(Request $request, $id){
        $rules = array(
            'password' => 'required|string|min:6|confirmed',
        );

        $messages = array(
            'password.required' => 'Password harus diisi',
            'password.confirmed' => 'Password tidak sama dengan konfirmasi password',
            'password.min' => 'Password harus lebih dari 6 karakter'
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails())
        {
            return redirect('users/change/'.$id)
            ->withErrors($validator);
        }

        User::updateOrCreate([
            'id' => $id],
            ['password' => $request->password,
        ]);

        return redirect('/users')->with('alert','Pengubahan password berhasil');
    }

    public function delete(Request $request ,$id){
        User::where('id', $request->id)->delete();
        return redirect('/users')->with('alert','Penghapusan akun berhasil');;
    }
}
