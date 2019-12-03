<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = \App\Upload::latest()->paginate(5);
        return view('upload.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('upload.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'file' => 'required|max:2048'
        ]);

        $file = $request->file('file');
        $new_name = rand(). '.' .$file->getClientOriginalExtension();
        $file->move(public_path('files'), $new_name);

        $form_data = array(
            'id_user' => $request->id_user,
            'id_cat' => $request->id_cat,
            'judul' => $request->judul,
            'file' => $new_name,
            'pengarang' => $request->pengarang,
            'institusi' => $request->institusi,
            'abstrak' => $request->abstrak,
            'view_count' => 0,
            'download_count' => 0
        );

        \App\Upload::create($form_data);

        return redirect('upload')->with('success', 'Data Berhasil di Upload');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = \App\Upload::findOrFail($id);
        return view('upload.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = \App\Upload::findOrFail($id);
        return view('upload.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $file_name = $request->hidden_file;
        $file = $request->file('file');
        if($file != ''){
            $request->validate([
                'judul' => 'required',
                'pengarang' => 'required',
                'file' => 'required|max:2048'
            ]);
            $file_name = rand(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('files'), $file_name);
            if (is_file(public_path('files/'.$request->hidden_file))) {
                unlink(public_path('files/'.$request->hidden_file));
            }
        }else{
            $request->validate([
                'judul' => 'required',
                'pengarang' => 'required'
            ]);
        }
        $form_data = array(
            'id_user' => $request->id_user,
            'id_cat' => $request->id_cat,
            'judul' => $request->judul,
            'file' => $file_name,
            'pengarang' => $request->pengarang,
            'institusi' => $request->institusi,
            'abstrak' => $request->abstrak
        );

        \App\Upload::whereId($id)->update($form_data);
        return redirect('upload')->with('success', 'Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = \App\Upload::findOrFail($id);
        unlink(public_path("files/".$data->file));
        $data->delete();
        return redirect('upload')->with('success', 'Data Berhasil dihapus');
    }



    // Admin Side

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin()
    {
        //
        $data = \App\Upload::latest()->join('users', 'users.id', '=', 'uploads.id_user')->join('categories', 'categories.id', '=' ,'uploads.id_cat')->join('roles', 'roles.id', '=', 'users.id')->select('uploads.*', 'users.name', 'users.id', 'categories.name_cat', 'roles.name_role')->paginate(5);
        return view('dashboardAdmin.upload.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAdmin()
    {
        //
        $data = \App\Category::all();
        return view('dashboardAdmin.upload.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAdmin(Request $request)
    {
        //
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'file' => 'required|max:2048'
        ]);

        $file = $request->file('file');
        $new_name = rand(). '.' .$file->getClientOriginalExtension();
        $file->move(public_path('files'), $new_name);

        $form_data = array(
            'id_user' => $request->id_user,
            'id_cat' => $request->id_cat,
            'judul' => $request->judul,
            'file' => $new_name,
            'pengarang' => $request->pengarang,
            'institusi' => $request->institusi,
            'abstrak' => $request->abstrak,
            'view_count' => 0,
            'download_count' => 0,
            'tahun' => $request->tahun
        );

        \App\Upload::create($form_data);

        return redirect('dashboardAdmin/upload')->with('success', 'Data Berhasil di Upload');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAdmin($id)
    {
        //
        $data = \App\Upload::findOrFail($id);
        return view('dashboardAdmin.upload.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAdmin($id)
    {
        //
        $data = \App\Upload::findOrFail($id);
        $data_cat = \App\Category::all();
        return view('dashboardAdmin.upload.edit', compact('data'), compact('data_cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAdmin(Request $request, $id)
    {
        //
        $file_name = $request->hidden_file;
        $file = $request->file('file');
        if($file != ''){
            $request->validate([
                'judul' => 'required',
                'pengarang' => 'required',
                'file' => 'required|max:2048'
            ]);
            $file_name = rand(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('files'), $file_name);
            if (is_file(public_path('files/'.$request->hidden_file))) {
                unlink(public_path('files/'.$request->hidden_file));
            }
        }else{
            $request->validate([
                'judul' => 'required',
                'pengarang' => 'required'
            ]);
        }
        $form_data = array(
            'id_user' => $request->id_user,
            'id_cat' => $request->id_cat,
            'judul' => $request->judul,
            'file' => $file_name,
            'pengarang' => $request->pengarang,
            'institusi' => $request->institusi,
            'abstrak' => $request->abstrak,
            'year' => $request->tahun
        );

        \App\Upload::whereId($id)->update($form_data);
        return redirect('dashboardAdmin/upload')->with('success', 'Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAdmin($id)
    {
        //
        $data = \App\Upload::findOrFail($id);
        unlink(public_path("files/".$data->file));
        $data->delete();
        return redirect('dashboardAdmin/upload')->with('success', 'Data Berhasil dihapus');
    }


    //User Side

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser($id_user)
    {
        //
        $data = \App\Upload::latest()->join('users', 'users.id', '=', 'uploads.id_user')->join('categories', 'categories.id', '=' ,'uploads.id_cat')->where('id_user',$id_user)->select('uploads.*', 'users.name', 'categories.name_cat')->paginate(5);
        return view('dashboardUser.upload.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);

        // $data = \App\Upload::all();
        // return view('dashboardUser.upload.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUser()
    {
        //
        $data = \App\Category::all();
        return view('dashboardUser.upload.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser(Request $request, $id_user)
    {
        //
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'file' => 'required|max:2048'
        ]);

        $file = $request->file('file');
        $new_name = rand(). '.' .$file->getClientOriginalExtension();
        $file->move(public_path('files'), $new_name);

        $form_data = array(
            'id_user' => $request->id_user,
            'id_cat' => $request->id_cat,
            'judul' => $request->judul,
            'file' => $new_name,
            'pengarang' => $request->pengarang,
            'institusi' => $request->institusi,
            'abstrak' => $request->abstrak,
            'view_count' => 0,
            'download_count' => 0,
            'year' => $request->tahun
        );

        \App\Upload::create($form_data);

        return redirect('dashboardUser/'.$id_user.'/upload')->with('success', 'Data Berhasil di Upload');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUser($id_user,$id)
    {
        //
        $data = \App\Upload::findOrFail($id);
        return view('dashboardUser.upload.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editUser($id_user,$id)
    {
        //
        $data = \App\Upload::findOrFail($id);
        $data_cat = \App\Category::all();
        return view('dashboardUser.upload.edit', compact('data'), compact('data_cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request,$id_user,$id)
    {
        //
        $file_name = $request->hidden_file;
        $file = $request->file('file');
        if($file != ''){
            $request->validate([
                'judul' => 'required',
                'pengarang' => 'required',
                'file' => 'required|max:2048'
            ]);
            $file_name = rand(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('files'), $file_name);
            if (is_file(public_path('files/'.$request->hidden_file))) {
                unlink(public_path('files/'.$request->hidden_file));
            }
        }else{
            $request->validate([
                'judul' => 'required',
                'pengarang' => 'required'
            ]);
        }
        $form_data = array(
            'id_user' => $request->id_user,
            'id_cat' => $request->id_cat,
            'judul' => $request->judul,
            'file' => $file_name,
            'pengarang' => $request->pengarang,
            'institusi' => $request->institusi,
            'abstrak' => $request->abstrak
        );

        \App\Upload::whereId($id)->update($form_data);
        return redirect('dashboardUser/'.$id_user.'/upload')->with('success', 'Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyUser($id_user,$id)
    {
        //
        $data = \App\Upload::findOrFail($id);
        unlink(public_path("files/".$data->file));
        $data->delete();
        return redirect('dashboardUser/'.$id_user.'/upload')->with('success', 'Data Berhasil dihapus');
    }


    // Home Side

    public function showHome($id)
    {
        //
        $data = \App\Upload::findOrFail($id);
        return view('upload.view', compact('data'));
    }

}
