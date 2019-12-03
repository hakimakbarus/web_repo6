<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrasiController extends Controller
{
    //
    public function create()
    {
        return view('registrasi.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $user = User::create(request(['id_role','name', 'email', 'password']));
        
        // $detail_user = \App\Detail_User::create()

        auth()->login($user);
        
        return redirect()->to('/dashboardUser');
    }
}
