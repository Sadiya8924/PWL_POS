<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel; // Menggunakan UserModel.php

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $validated = $request->validate([
                'username' => 'required|min:3|max:50|unique:m_user,username',
                'nama' => 'required|min:3|max:50',
                'password' => 'required|min:6|confirmed',
                'level_id' => 'required|integer',
            ]);

            // Simpan user ke dalam tabel m_user
            $user = UserModel::create([
                'username' => $validated['username'],
                'nama' => $validated['nama'],
                'password' => Hash::make($validated['password']),
                'level_id' => $validated['level_id'], // Sekarang disimpan di m_user
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Registrasi berhasil, silakan login!',
                'redirect' => url('/login')
            ]);
        }

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login');
    }

    public function listUsers()
    {
        $users = UserModel::all();
        return response()->json([
            'status' => true,
            'data' => $users
        ]);
    }
}