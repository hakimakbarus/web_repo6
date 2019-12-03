<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function update(Request $request, $id){

    	$image_name = $request->hidden_image;
        $image = $request->file('foto');
        if($image != ''){
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'foto' => 'image|max:2048'
            ]);
            $image_name = rand(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
            if(is_file(public_path('images/'.$request->hidden_image))){
            	unlink(public_path('images/'.$request->hidden_image));
        	}
        }else{
            $request->validate([
                'name' => 'required',
                'email' => 'required'
            ]);
        }

        $form_data = array(
            'name' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'foto' => $image_name,
            'bio' => $request->bio,
            'jenis_kelamin' => $request->jenis_kelamin
        );

    	$user = \App\User::find($id);
    	$user->update($form_data);
    	if($user->id_role == 1){
    		return redirect('/dashboardAdmin/'.$id.'/profile')->with('sukses','Data berhasil diupdate');	
    	}else{
    		return redirect('/dashboardUser/'.$id.'/profile')->with('sukses','Data berhasil diupdate');
    	}
        
        // return dd($request);
    }
}
