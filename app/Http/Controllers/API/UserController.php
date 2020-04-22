<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\User as UserResource;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'required|password:api',
            'nim' => 'required|unique:users,nim,'.$user->id,
            'jeniskelamin' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'angkatan' => 'required',
            'nohp' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        if (!empty($user->password)) {
            $user->password = bcrypt($request->password);
        }
        else {
            $user = array_except($user,array('password'));
        }

        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        $user->nim = $request->nim;
        $user->jeniskelamin = $request->jeniskelamin;
        $user->ttl = $request->ttl;
        $user->angkatan = $request->angkatan;
        $user->nohp = $request->nohp;
        $user->save();


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
    public function routeNotificationForFcm()
    {
        return $this->fcm_token;
    }
}
