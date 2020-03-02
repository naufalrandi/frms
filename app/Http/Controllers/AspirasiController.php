<?php

namespace App\Http\Controllers;

use App\Aspirasi;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Aspirasi::orderBy('id', 'DESC')->paginate(5);
        return view('aspirasi.index', compact('data'))
            ->with('i', ($request->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aspirasi.create');
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
            'aspirasi' => 'required',
        ]);
        $input = $request->all();

        Aspirasi::create($input);

        return redirect()->route('aspirasi.index')
            ->with('success','Aspirasi Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aspirasi = Aspirasi::find($id);
        return view('aspirasi.show',compact('aspirasi'))->with('aspirasi',$aspirasi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aspirasi = Aspirasi::find($id);
        return view('aspirasi.edit', compact('aspirasi'));
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
            'aspirasi' => 'required',
        ]);

        $input = $request->all();

        $aspirasi = Aspirasi::find($id);
        $aspirasi->update($input);

        return redirect()->route('aspirasi.index')
            ->with('success','Aspirasi updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aspirasi::find($id)->delete();
        return redirect()->route('aspirasi.index')
            ->with('success', 'Aspirasi Deleted');
    }
}
