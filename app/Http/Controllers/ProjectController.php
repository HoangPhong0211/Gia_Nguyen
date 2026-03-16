<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::query()
            ->where('status', 'published')
            ->orderByDesc('year')
            ->orderByDesc('created_at')
            ->get();

        return view('projects', [
            'projects' => $projects,
        ]);
    }
}
