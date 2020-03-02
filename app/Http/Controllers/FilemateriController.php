<?php

namespace App\Http\Controllers;

use App\Filemateri;
use App\Matakuliah;
use Illuminate\Http\Request;

class FilemateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $matakuliah = Matakuliah::all();
        $data = Filemateri::orderBy('id', 'DESC')->paginate(5);
        return view('filemateri.index', compact('data','matakuliah'))
            ->with('i', ($request->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matakuliah = Matakuliah::get()->all();
        return view('filemateri.create' , compact('matakuliah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'file' => 'required',
            'matkul_id' => 'required',
        ]);

        $input = $request->all();
        $filemateri = Filemateri::create($input);
        $filemateri->matkul_id = Matakuliah::get('id');

        return redirect()->route('filemateri.index')
            ->with('success','Filemateri Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filemateri = Filemateri::find($id);
        $matakuliah = Matakuliah::get()->all();
        return view('filemateri.show',compact('filemateri'))->with('filemateri',$filemateri);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $filemateri = Filemateri::find($id);
        $matakuliah = Matakuliah::get()->all();
        return view('filemateri.edit', compact('filemateri','matakuliah'));
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
        $this->validate($request, [
            'name' => 'required',
            'file' => 'required',
            'matkul_id' => 'required',
        ]);

        $input = $request->all();

        $filemateri = Filemateri::find($id);
        $filemateri->matkul_id = Matakuliah::get('id');
        $filemateri->update($input);

        return redirect()->route('filemateri.index')
            ->with('success','filemateri updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Filemateri::find($id)->delete();
        return redirect()->route('filemateri.index')
            ->with('success', 'Filemateri Deleted');
    }
}
