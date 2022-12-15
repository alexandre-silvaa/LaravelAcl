<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $caminhos = [
            ['url'=>'/admin', 'titulo'=>'Admin']
        ];

        return view('admin.index', compact('caminhos'));
    }
}
