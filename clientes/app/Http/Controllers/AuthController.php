<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        // busca usuário admin por email (SQL puro)
        $rows = DB::select("SELECT id, name, email, password, is_superadmin FROM admin_users WHERE email = ? LIMIT 1", [
            $data['email']
        ]);

        if (count($rows) === 0) {
            return back()->withErrors(['email' => 'Credenciais inválidas'])->withInput();
        }

        $user = $rows[0];

        if (!Hash::check($data['password'], $user->password)) {
            return back()->withErrors(['email' => 'Credenciais inválidas'])->withInput();
        }

        session([
            'admin_user_id' => $user->id,
            'admin_user_name' => $user->name,
            'is_superadmin' => (bool)$user->is_superadmin,
        ]);

        return redirect()->route('admin.clientes');
    }

    public function logout()
    {
        session()->forget(['admin_user_id','admin_user_name','is_superadmin']);
        return redirect()->route('admin.login.form')->with('success', 'Você saiu da área administrativa.');
    }
}
