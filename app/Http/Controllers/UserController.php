<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_outlet' => 'required|max:20',
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:Users',
            'password' => 'required|string:min:6',
            'role' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ]);
        }

        $user = new User();
        $user->id_outlet = $request->id_outlet;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        $data = User::where('username', '=', $request->username)->first();
        
        return response()->json([
            'success'
        ]);
    }
}
