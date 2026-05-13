<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProjects     = Project::count();
        $pendingProjects   = Project::where('status', 'pending')->count();
        $validatedProjects = Project::where('status', 'validated')->count();
        $totalClients      = User::where('is_admin', false)->count();
        $recentProjects    = Project::with('user', 'service')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProjects',
            'pendingProjects',
            'validatedProjects',
            'totalClients',
            'recentProjects'
        ));
    }
}
