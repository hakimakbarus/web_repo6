<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home(){
    	// return view('home');
    	$data = \App\Upload::latest()->join('categories', 'categories.id', '=', 'uploads.id_cat')->select('uploads.*', 'categories.name_cat')->paginate(3);
        return view('home', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function homeAdmin(){
    	// return view('home');
    	$data = \App\Upload::latest()->join('categories', 'categories.id', '=', 'uploads.id_cat')->select('uploads.*', 'categories.name_cat')->paginate(3);
        return view('dashboardAdmin/home', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function homeUser(){
    	// return view('home');
    	$data = \App\Upload::latest()->join('categories', 'categories.id', '=', 'uploads.id_cat')->select('uploads.*', 'categories.name_cat')->paginate(3);
        return view('dashboardUser/home', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function showHome($id){
        $data = \App\Upload::findOrFail($id);
        $data->view_count = ($data->view_count+1);
        $data->save();

        return view('viewUpload', compact('data'));
    }

    public function downloadHome($id){
        $data = \App\Upload::findOrFail($id);
        $data->download_count = ($data->download_count+1);
        $data->save();

        return redirect('/files/'.$data->file);
    }

    public function showUser($id){
        $data = \App\Upload::findOrFail($id);
        $data->view_count = ($data->view_count+1);
        $data->save();

        return view('dashboardUser.upload.view', compact('data'));
    }

    public function downloadUser($id){
        $data = \App\Upload::findOrFail($id);
        $data->download_count = ($data->download_count+1);
        $data->save();

        return redirect('/files/'.$data->file);
    }

    public function showAdmin($id){
        $data = \App\Upload::findOrFail($id);
        $data->view_count = ($data->view_count+1);
        $data->save();

        return view('dashboardAdmin.upload.view', compact('data'));
    }

    public function downloadAdmin($id){
        $data = \App\Upload::findOrFail($id);
        $data->download_count = ($data->download_count+1);
        $data->save();

        return redirect('/files/'.$data->file);
    }
}
