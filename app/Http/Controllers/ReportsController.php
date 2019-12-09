<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReportsController extends Controller
{
    //
    public function topCategoryAdmin() {
    	// $data = \App\Upload::all()->join('categories', 'categories.id', '=', 'uploads.id_cat')
    	// 						  ->select('count(uploads.*) as jumlah', 'categories.name_cat')
    	// 						  ->groupBy('categories.name_cat')
    	// 						  ->get();
    	$data = DB::table('uploads')
         ->leftJoin('categories', 'uploads.id_cat', '=', 'categories.id')
         ->select('categories.name_cat', DB::raw('COUNT(*) AS total'))
         ->groupBy('categories.name_cat')
         ->get();
        $dataset = $data->toArray();

    	return view('dashboardAdmin.report.topCategories', compact('dataset'));
    }

    public function getTopCategories(){
    	$data = DB::table('uploads')
         ->leftJoin('categories', 'uploads.id_cat', '=', 'categories.id')
         ->select('categories.name_cat', DB::raw('COUNT(*) AS total'))
         ->groupBy('categories.name_cat')
         ->get();

        return response()->json($data);
    }

    //
    public function topDownloadsAdmin() {
    	// $data = \App\Upload::all()->join('categories', 'categories.id', '=', 'uploads.id_cat')
    	// 						  ->select('count(uploads.*) as jumlah', 'categories.name_cat')
    	// 						  ->groupBy('categories.name_cat')
    	// 						  ->get();
    	$data = DB::table('uploads')
         ->leftJoin('users', 'users.id', '=', 'uploads.id_user')
         ->select('users.name', 'uploads.download_count')
         ->where('uploads.download_count', '>', 0)
         ->orderBy('uploads.download_count','desc')
         ->limit(5)
         ->get();
        $dataset = $data->toArray();

    	return view('dashboardAdmin.report.topDownloads', compact('dataset'));
    }

    public function getTopTopDownloads(){
    	$data = DB::table('uploads')
         ->leftJoin('users', 'users.id', '=', 'uploads.id_user')
         ->select('users.name', 'uploads.*')
         ->where('uploads.download_count', '>', 0)
         ->orderBy('uploads.download_count','desc')
         ->limit(5)
         ->get();

        return response()->json($data);
    }

    public function topViewsAdmin() {
    	// $data = \App\Upload::all()->join('categories', 'categories.id', '=', 'uploads.id_cat')
    	// 						  ->select('count(uploads.*) as jumlah', 'categories.name_cat')
    	// 						  ->groupBy('categories.name_cat')
    	// 						  ->get();
    	$data = DB::table('uploads')
         ->leftJoin('users', 'users.id', '=', 'uploads.id_user')
         ->select('users.name', 'uploads.download_count')
         ->where('uploads.download_count', '>', 0)
         ->orderBy('uploads.download_count','desc')
         ->limit(5)
         ->get();
        $dataset = $data->toArray();

    	return view('dashboardAdmin.report.topViews', compact('dataset'));
    }

    public function getTopTopViews(){
    	$data = DB::table('uploads')
         ->leftJoin('users', 'users.id', '=', 'uploads.id_user')
         ->select('users.name', 'uploads.*')
         ->where('uploads.view_count', '>', 0)
         ->orderBy('uploads.view_count','desc')
         ->limit(5)
         ->get();

        return response()->json($data);
    }
}
