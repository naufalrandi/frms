<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Mahasiswa::orderBy('id', 'DESC')->paginate(5);
        return view('mahasiswa.index', compact('data'))
            ->with('i', ($request->input('page', 1) -1) *5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
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
            'nim' => 'required',
            'jeniskelamin' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'angkatan' => 'required',
        ]);
        $input = $request->all();

        Mahasiswa::create($input);

        return redirect()->route('mahasiswa.index')
            ->with('success','mahasiswa Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.show',compact('mahasiswa'))->with('mahasiswa',$mahasiswa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
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
            'nim' => 'required',
            'jeniskelamin' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'angkatan' => 'required',
        ]);

        $input = $request->all();

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->update($input);

        return redirect()->route('mahasiswa.index')
            ->with('success','mahasiswa updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::find($id)->delete();
        return redirect()->route('mahasiswa.index')
            ->with('success', 'mahasiswa Deleted');
    }
}
