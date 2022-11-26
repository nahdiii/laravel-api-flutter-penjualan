<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class PenggunaController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
    }

    public function hapusPengguna($id)
    {
        $pengguna = User::findOrFail($id);
        $pengguna->delete();
    }

    public function ubahPengguna(Request $request, $id)
    {
        $pengguna = User::findOrFail($id);
        $data=[
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ];

        $pengguna->update($data);
    }


    public function login(Request $request)
    {
        if (Auth::attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ]
        )) {
            $user = Auth::user();

            $token = $user->createToken($user->name)->accessToken;
            $data['user'] = $user;
            $data['token'] = $token;

            return response()->json([

                'success' => true,
                'data' => $data,
                'pesan' => 'Login Berhasil',
                'token' => $token,

            ], 200);

            // 200 itu artinya SUKSES
        } else {
            return response()->json([
                'success' => false,
                'data' => '',
                'pesan' => 'Login Gagal'
            ], 401);
            // 401 itu artinya error unauthorized
        }
    }
}
