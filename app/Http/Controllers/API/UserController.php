<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\User as UserResource;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = User::paginate();
        // return response()->json($user, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = $request->user();

        if (is_null($user)) {
            return $this->sendError('user not found.');
        }

        return $this->sendResponse(new UserResource($user), 'user retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($request->name);
        // $input = $request->all();
        $user = $request->user();
        // dd($input);

        // $validator = Validator::make($input, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email'.$user,
        //     'password' => 'required|same:confirm-password',
        //     'nim' => 'required',
        //     'jeniskelamin' => 'required',
        //     'ttl' => 'required',
        //     'alamat' => 'required',
        //     'angkatan' => 'required',
        //     'nohp' => 'required',
        // ]);

        // if($validator->fails()){
        //     return $this->sendError('Validation Error.', $validator->errors());
        // }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->nim = $request->nim;
        $user->jeniskelamin = $request->jeniskelamin;
        $user->ttl = $request->ttl;
        $user->angkatan = $request->angkatan;
        $user->nohp = $request->nohp;
        $user->save();
        // dd($user);
        return $this->sendResponse(new UserResource($user), 'User updated successfully.');
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
    }
}
