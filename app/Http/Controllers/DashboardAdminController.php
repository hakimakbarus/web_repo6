<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    //
    public function index()
    {
        //
        //$data = \App\Upload::latest()->paginate(5);
        return view('dashboardAdmin.index');
                //->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function home(){
        return view('dashboardAdmin.home');
    }

    public function showProfile($id){
        $user = \App\User::findOrFail($id);
        
        return view('/dashboardAdmin/profile', ['user' => $user]);
    }
}
