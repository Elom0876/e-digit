<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-digit Admin — Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#5b8ef0">
</head>
<body class="bg-gray-950 text-white font-sans">

    <nav class="fixed w-full z-50 bg-gray-950/90 backdrop-blur border-b border-gray-800">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <span class="text-2xl font-bold text-blue-400">E-digit <span class="text-xs text-gray-500 font-normal ml-2">ADMIN</span></span>
            <div class="flex items-center gap-6">
                <a href="{{ route('admin.projects.index') }}" class="text-gray-400 hover:text-white text-sm transition">Projets</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-gray-800 hover:bg-gray-700 text-gray-300 hover:text-white px-4 py-2 rounded-lg text-sm transition">
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-6 pt-28 pb-16">

        <div class="mb-10">
            <h1 class="text-3xl font-bold">Dashboard Admin</h1>
            <p class="text-gray-400 mt-1">Vue d'ensemble de votre activité</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
                <p class="text-gray-400 text-sm">Total projets</p>
                <p class="text-3xl font-bold mt-1">{{ $totalProjects }}</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
                <p class="text-gray-400 text-sm">En attente</p>
                <p class="text-3xl font-bold mt-1 text-yellow-400">{{ $pendingProjects }}</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
                <p class="text-gray-400 text-sm">Validés</p>
                <p class="text-3xl font-bold mt-1 text-blue-400">{{ $validatedProjects }}</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
                <p class="text-gray-400 text-sm">Clients</p>
                <p class="text-3xl font-bold mt-1 text-green-400">{{ $totalClients }}</p>
            </div>
        </div>

        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold">Projets récents</h2>
                <a href="{{ route('admin.projects.index') }}" class="text-blue-400 hover:text-blue-300 text-sm transition">
                    Voir tous →
                </a>
            </div>

            @if($recentProjects->isEmpty())
                <p class="text-gray-500 text-center py-8">Aucun projet pour l'instant.</p>
            @else
                <div class="flex flex-col gap-3">
                    @foreach($recentProjects as $project)
                        @php
                            $colors = [
                                'pending'     => 'bg-yellow-500/10 text-yellow-400',
                                'validated'   => 'bg-blue-500/10 text-blue-400',
                                'rejected'    => 'bg-red-500/10 text-red-400',
                                'in_progress' => 'bg-purple-500/10 text-purple-400',
                                'completed'   => 'bg-green-500/10 text-green-400',
                            ];
                            $labels = [
                                'pending'     => 'En attente',
                                'validated'   => 'Validé',
                                'rejected'    => 'Refusé',
                                'in_progress' => 'En cours',
                                'completed'   => 'Terminé',
                            ];
                        @endphp
                        <a href="{{ route('admin.projects.show', $project) }}"
                           class="flex justify-between items-center p-4 bg-gray-800 hover:bg-gray-700 rounded-xl transition">
                            <div>
                                <p class="font-semibold">{{ $project->title }}</p>
                                <p class="text-gray-400 text-sm mt-1">
                                    {{ $project->user->name }} — {{ $project->created_at->format('d/m/Y') }}
                                </p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $colors[$project->status] }}">
                                {{ $labels[$project->status] }}
                            </span>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</body>
</html>