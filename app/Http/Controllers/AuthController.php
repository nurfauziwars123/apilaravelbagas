<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tipe_user' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telpon' => 'required',
            'username' => 'required',
            'password' => 'required',
            // 'confirm_password' => 'required|same:password'

        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Ada Kesalahan',
                'data' =>   $validator->errors()
            ]);
        }

        $input = $request->all();
        //$input['password'] = bcrypt($input['password']);
        $user = UserModel::create($input);

        //$success['token'] = $user->createToken('auth_token')->plainTextToken;
        $success['nama'] = $user->nama;

        return response()->json([
            'success' => true,
            'message' => 'Sukses Register',
            'data' => $success
        ]);
    }

    public function login(Request $request)
    {

        $user = UserModel::where('username', $request->username)->first();

        if ($user == true && $request->password == $user->password) {
            $success['nama'] = $user->nama;
            return response()->json([
                'success' => true,
                'message' => 'Login Sukses!',
                'data' => $success
            ]);
        }

        // if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input()])) {
        //     $auth = Auth::UserModel();
        //     $success['nama'] = $auth->nama;
        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Login Sukses!',
        //         'data' => $success
        //     ]);
        // } 
        else {
            // $auth = Auth::user();
            //$success['username'] = $auth->username;
            return response()->json([
                'success' => false,
                'message' => 'Username atau Password salah!',
                'data' => null
            ]);
        }
    }
}
