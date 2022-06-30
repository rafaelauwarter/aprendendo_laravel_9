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
}
