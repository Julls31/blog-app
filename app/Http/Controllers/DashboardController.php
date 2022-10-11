<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data1['users'] = DB::table('users')->count();
        $data1['posts'] = DB::table('posts')->count();
        return view('admin.index', compact('data1'));
    }
}
