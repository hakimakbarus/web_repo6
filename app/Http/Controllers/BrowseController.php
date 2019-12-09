<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrowseController extends Controller
{
    //
    
	public function indexYearHome(){
		return view('browseByYears');
    }

    public function catchYearHome(Request $request){
    	return redirect('browse/year/'.$request->year.'/show');
    }

    public function browseByYearHome($year){
    	$data = \App\Upload::latest()->join('categories', 'categories.id', '=', 'uploads.id_cat')->select('uploads.*', 'categories.name_cat')->where('year',$year)->paginate(4);
    	return view('browseByYearsView', compact('data'));
    } 

    public function indexCategoryHome(){
    	$data_cat = \App\Category::all();
		return view('browseByCategories', compact('data_cat'));
    }

    public function catchCategoryHome(Request $request){
    	return redirect('browse/category/'.$request->id_cat.'/show');
    }

    public function browseByCategoryHome($id_cat){
    	$data_cat = \App\Category::all();
    	$data = \App\Upload::latest()->join('categories', 'categories.id', '=', 'uploads.id_cat')->select('uploads.*', 'categories.name_cat')->where('id_cat',$id_cat)->paginate(4);
    	return view('browseByCategoriesView', compact('data'), compact('data_cat'));
    }



    //User

    public function indexYearUser(){
        return view('dashboardUser.browse.browseByYears');
    }

    public function catchYearUser(Request $request){
        return redirect('dashboardUser/browse/year/'.$request->year.'/show');
    }

    public function browseByYearUser($year){
        $data = \App\Upload::latest()->join('categories', 'categories.id', '=', 'uploads.id_cat')->select('uploads.*', 'categories.name_cat')->where('year',$year)->paginate(4);
        return view('dashboardUser.browse.browseByYearsView', compact('data'));
    } 

    public function indexCategoryUser(){
        $data_cat = \App\Category::all();
        return view('dashboardUser.browse.browseByCategories', compact('data_cat'));
    }

    public function catchCategoryUser(Request $request){
        return redirect('dashboardUser/browse/category/'.$request->id_cat.'/show');
    }

    public function browseByCategoryUser($id_cat){
        $data_cat = \App\Category::all();
        $data = \App\Upload::latest()->join('categories', 'categories.id', '=', 'uploads.id_cat')->select('uploads.*', 'categories.name_cat')->where('id_cat',$id_cat)->paginate(4);
        return view('dashboardUser.browse.browseByCategoriesView', compact('data'), compact('data_cat'));
    }

    //----// 

    //Admin

    public function indexYearAdmin(){
        return view('dashboardAdmin.browse.browseByYears');
    }

    public function catchYearAdmin(Request $request){
        return redirect('dashboardAdmin/browse/year/'.$request->year.'/show');
    }

    public function browseByYearAdmin($year){
        $data = \App\Upload::latest()->join('categories', 'categories.id', '=', 'uploads.id_cat')->select('uploads.*', 'categories.name_cat')->where('year',$year)->paginate(4);
        return view('dashboardAdmin.browse.browseByYearsView', compact('data'));
    } 

    public function indexCategoryAdmin(){
        $data_cat = \App\Category::all();
        return view('dashboardAdmin.browse.browseByCategories', compact('data_cat'));
    }

    public function catchCategoryAdmin(Request $request){
        return redirect('dashboardAdmin/browse/category/'.$request->id_cat.'/show');
    }

    public function browseByCategoryAdmin($id_cat){
        $data_cat = \App\Category::all();
        $data = \App\Upload::latest()->join('categories', 'categories.id', '=', 'uploads.id_cat')->select('uploads.*', 'categories.name_cat')->where('id_cat',$id_cat)->paginate(4);
        return view('dashboardAdmin.browse.browseByCategoriesView', compact('data'), compact('data_cat'));
    }

    //----// 
}
