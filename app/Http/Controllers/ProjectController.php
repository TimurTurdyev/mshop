<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return view('store.project', [
            'projects' => Project::query()
                ->where('status', 1)
                ->orderByDesc('id')
                ->paginate(15)
        ]);
    }

    public function post(Project $project)
    {
        $prev = Project::query()->where('id', '<', $project->id)->orderByDesc('id')->first(['id', 'slug']);
        $next = Project::query()->where('id', '>', $project->id)->orderBy('id')->first(['id', 'slug']);

        return view('store.project-post', [
            'project' => $project,
            'prev' => $prev,
            'next' => $next,
        ]);
    }
}
