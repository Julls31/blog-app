<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin/login');
    }

    // proses login
    public function login(Request $request)
    {
        // cek form validation
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // cek apakah email dan password benar
        if (auth()->attempt(request([ 'email', 'password']))) {
            $users = DB::table('users') 
            ->where ('email', $request-> input ('email'))
            ->get();
            foreach ($users as $row) {
                $name = $row->name;
                $id = $row->id;
                }
             $request->session()->put('name', $name);
             $request->session()->put('id', $id);

            return redirect('admin');
        }

        // jika salah, kembali ke halaman login
        return redirect()->back()->with('error', 'Email atau Password salah');
    }

    // fungsi logout
    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}