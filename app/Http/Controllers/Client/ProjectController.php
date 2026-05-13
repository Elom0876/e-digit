<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Auth::user()->projects()->latest()->get();
        return view('client.projects.index', compact('projects'));
    }

    public function create()
    {
        $services = Service::all();
        return view('client.projects.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'           => 'required|string|max:255',
            'service_id'      => 'nullable|exists:services,id',
            'description'     => 'required|string|min:20',
            'client_deadline' => 'required|integer|min:1',
        ]);

        Auth::user()->projects()->create($request->only([
            'title',
            'service_id',
            'description',
            'client_deadline'
        ]));

        return redirect()->route('client.projects.index')
            ->with('success', 'Votre projet a été soumis avec succès !');
    }

    public function show(Project $project)
    {
        abort_if($project->user_id !== Auth::id(), 403);
        return view('client.projects.show', compact('project'));
    }
}
