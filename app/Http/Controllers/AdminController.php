<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Retorne a visão do painel do administrador
        return view('admin.dashboard');
    }
}