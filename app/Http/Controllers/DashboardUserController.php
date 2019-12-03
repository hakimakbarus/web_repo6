<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    //
    public function index()
    {
        //
        return view('dashboardUser.index');
    }

    public function home(){
        return view('dashboardUser.home');
    }

    public function showProfile($id){
        $user = \App\User::findOrFail($id);
        
        return view('/dashboardUser/profile', ['user' => $user]);
    }
}
