<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('user', 'service')->latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $project->load('user', 'service');
        return view('admin.projects.show', compact('project'));
    }

    public function validateProject(Request $request, Project $project)
    {
        $request->validate([
            'validated_price'    => 'required|numeric|min:0',
            'validated_deadline' => 'required|integer|min:1',
            'admin_note'         => 'nullable|string',
        ]);

        $project->update([
            'status'             => 'validated',
            'validated_price'    => $request->validated_price,
            'validated_deadline' => $request->validated_deadline,
            'admin_note'         => $request->admin_note,
        ]);

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Projet validé avec succès !');
    }

    public function rejectProject(Request $request, Project $project)
    {
        $request->validate([
            'admin_note' => 'required|string',
        ]);

        $project->update([
            'status'     => 'rejected',
            'admin_note' => $request->admin_note,
        ]);

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Projet refusé.');
    }
}
