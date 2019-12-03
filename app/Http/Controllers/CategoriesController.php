<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = \App\Category::latest()->paginate(5);
        return view('dashboardAdmin.category.index', compact('data'))
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
        return view('dashboardAdmin.category.create');
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
            'name' => 'required',
            'desc' => 'required',
        ]);

        $form_data = array(
            'name_cat' => $request->name,
            'desc_cat' => $request->desc
        );

        \App\Category::create($form_data);

        return redirect('dashboardAdmin/category')->with('success', 'Data Berhasil di Simpan');
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
        $data = \App\Category::findOrFail($id);
        return view('dashboardAdmin.category.view', compact('data'));
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
        $data = \App\Category::findOrFail($id);
        return view('dashboardAdmin.category.edit', compact('data'));
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
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
        ]);

        $form_data = array(
            'name_cat' => $request->name,
            'desc_cat' => $request->desc
        );

        \App\Category::whereId($id)->update($form_data);

        return redirect('dashboardAdmin/category')->with('success', 'Data Berhasil di Simpan');
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
        $data = \App\Category::findOrFail($id);
        // unlink(public_path("files/".$data->file));
        $data->delete();
        return redirect('dashboardAdmin/category')->with('success', 'Data Berhasil dihapus');
    }
}
