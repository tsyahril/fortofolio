<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Project;
use App\Models\Skill;


class DashboardController extends Controller
{
    public function index()
    {
        $informasi = Informasi::first();
        $totalProject = Project::count();
        $totalSkill = Skill::count();

       return view('pages.admin.dashboard', compact (
        'informasi',
        'totalProject',
        'totalSkill'
       ));
    }
}
