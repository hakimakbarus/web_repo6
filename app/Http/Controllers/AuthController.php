<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login() {
        return view('auths.login');
    }

    public function postlogin(Request $request){
        // dd($request->all());
        if(Auth::attempt($request->only('email','password'))){
        	$data = \App\User::where('email', '=', $request->email)->get();
        	if($data[0]->id_role == 1){
        		return redirect('/dashboardAdmin');	
        	}else{
        		return redirect('/dashboardUser');
        	}
        	//return redirect('/dashboardAdmin');	
            //dd($data);
        }else{
            return redirect('/login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function daftar(){
        return view('auths.register');
    }
}
