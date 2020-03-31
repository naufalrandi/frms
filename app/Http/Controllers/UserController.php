<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Datatables;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->paginate(5);
        return view('users.index', compact('data'))
            ->with('i', ($request->input('page', 1) -1) *5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'is_admin' => 'required',
            'nim' => 'required',
            'jeniskelamin' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'angkatan' => 'required',
            'nohp' => 'required',
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        return redirect()->route('users.index')
            ->with('success','User Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'))->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
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
            'email' => 'required|email|unique:users,email'.$id,
            'password' => 'required|same:confirm-password',
            'is_admin' => 'required',
            'nim' => 'required',
            'jeniskelamin' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'angkatan' => 'required',
            'nohp' => 'required',
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        }
        else {
            $input = array_except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);

        return redirect()->route('users.index')
            ->with('success','User updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User Deleted');
    }

    public function search(Request $request)
	{
        $search = User::when($request->q, function ($query) use ($request) {
            $query->where('name', 'LIKE', "%{$request->q}%")
                  ->orWhere('jeniskelamin', 'LIKE', "%{$request->q}%")
                  ->orWhere('email', 'LIKE', "%{$request->q}%")
                  ->orWhere('angkatan', 'LIKE', "%{$request->q}%")
                  ->orWhere('alamat', 'LIKE', "%{$request->q}%")
                  ->orWhere('nim', 'LIKE', "%{$request->q}%");
            })->paginate(5);
        return view('users.index', compact('search'));

	}

}
