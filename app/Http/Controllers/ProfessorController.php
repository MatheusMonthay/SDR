<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        // Retorne a visão do painel do professor
        return view('professor.dashboard');
    }
}