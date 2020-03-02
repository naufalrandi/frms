<?php

namespace App\Http\Controllers;

use App\Matakuliah;
use App\Semester;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $semester = Semester::all();
        $data = Matakuliah::orderBy('id', 'DESC')->paginate(5);
        return view('matakuliah.index', compact('data','semester'))
            ->with('i', ($request->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semester = Semester::get()->all();
        return view('matakuliah.create' , compact('semester'));
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
            'kode' => 'required',
            'matkulwajib' => 'required',
            'sks' => 'required',
            'semester_id' => 'required',
        ]);
        $input = $request->all();

        $matakuliah = Matakuliah::create($input);
        $matakuliah->semester_id = Semester::get('id');

        return redirect()->route('matakuliah.index')
            ->with('success','Matakuliah Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matakuliah = Matakuliah::find($id);
        $semester = Semester::get()->all();
        return view('matakuliah.show',compact('matakuliah'))->with('matakuliah',$matakuliah);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matakuliah = Matakuliah::find($id);
        $semester = Semester::get()->all();
        return view('matakuliah.edit', compact('matakuliah','semester'));
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
            'kode' => 'required',
            'matkulwajib' => 'required',
            'sks' => 'required',
            'semester_id' => 'required',
        ]);

        $input = $request->all();

        $matakuliah = Matakuliah::find($id);
        $matakuliah->semester_id = Semester::get('id');
        $matakuliah->update($input);

        return redirect()->route('matakuliah.index')
            ->with('success','Matakuliah updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matakuliah::find($id)->delete();
        return redirect()->route('matakuliah.index')
            ->with('success', 'Matakuliah Deleted');
    }
}
