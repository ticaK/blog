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

        //alternativono sa Hash:make
        $data = $request->only(['email','name','password']);
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        
        return redirect('/posts');
        //return redirect(route(posts.index));
        
        

        //ovo iznas smo mogli sa new 

    }
}
