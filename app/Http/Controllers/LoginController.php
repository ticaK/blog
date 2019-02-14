<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function logout(){
        auth()->logout();
        return redirect()->route('posts.index');//moze i drugi nacin
    }

    public function create(){
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(!auth()->attempt($request->only(['email','password']))){
        return back()->withErrors([
        'message'=>'wrong login...'
    ]);
    return redirect()->route('posts.index');

        
        }




    }
}
