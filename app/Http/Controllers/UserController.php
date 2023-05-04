<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserDetailResource;
use App\Http\Resources\UserResource;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $user = UserModel::all();
        // return response()->json(['data' => $user]);
        return UserResource::collection($user);
    }
    public function show($id_user)
    {
        $user = UserModel::findOrFail($id_user);
        //return response()->json($user);
        return  new UserDetailResource($user);
    }
}
