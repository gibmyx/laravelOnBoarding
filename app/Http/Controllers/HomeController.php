<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;
use App\Models\ProfessorModel;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('home');
    }

    public function all(): View
    {
        $students = StudentModel::all();
        $professors = ProfessorModel::all();
        return view('all', compact('students', 'professors'));
    }
}

