<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Project;
use App\Models\Skill;

class HomeController extends Controller
{
        public function index()
    {
        // Ambil 3 skill terbaru
        $skills = Skill::latest()->limit(3)->get();

        // Ambil 2 project terbaru
        $project = Project::latest()->limit(2)->get();

        $informasi = Informasi::first();
        $project = project::all();
        $skills = skill::all();
        return view('welcome', compact('informasi','project', 'skills'));
    }
}
