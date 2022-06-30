<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::get();
        // dd($users);
        return view('users.index', [
            'users' => $users
            // ou compact('users')
        ]);
    }

    public function show($id){
        if (!$user = User::where('id', '=', $id)->first()){
            return redirect()->route('users.index');
        };
        return view('users.show', compact('user'));
        // dd($user);
        // dd('users.show', $id);
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->route('users.index');
        // dd($request->only([
        //     'name', 'email', 'password'
        // ]));
    }
}
