<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');

    }


    public function store(Request $request){
        $this->validate($request,[
            'email'=>'required|email|unique:users,email',
            'name'=>'required',
            'password'=>'required|min:6',
            
            //users je tabela, kolona email 

        ]);

        return User::create($request->only(['email','name','password']));
        
        
        //ovo iznas smo mogli sa new 

    }
}
