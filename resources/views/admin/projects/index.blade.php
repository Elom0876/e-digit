<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-digit Admin — Projets</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#5b8ef0">
</head>
<body class="bg-gray-950 text-white font-sans">

    <nav class="fixed w-full z-50 bg-gray-950/90 backdrop-blur border-b border-gray-800">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <span class="text-2xl font-bold text-blue-400">E-digit <span class="text-xs text-gray-500 font-normal ml-2">ADMIN</span></span>
            <div class="flex items-center gap-6">
                <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:text-white text-sm transition">Dashboard</a>
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
            <h1 class="text-3xl font-bold">Tous les projets</h1>
            <p class="text-gray-400 mt-1">Gérez et validez les projets soumis par vos clients</p>
        </div>

        @if($projects->isEmpty())
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-16 text-center">
                <p class="text-5xl mb-4">📋</p>
                <p class="text-gray-500">Aucun projet pour l'instant.</p>
            </div>
        @else
            <div class="flex flex-col gap-4">
                @foreach($projects as $project)
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
                       class="bg-gray-900 border border-gray-800 hover:border-blue-500 rounded-2xl p-6 flex justify-between items-center transition">
                        <div>
                            <h3 class="font-bold text-lg">{{ $project->title }}</h3>
                            <p class="text-gray-400 text-sm mt-1">
                                Client : <span class="text-white">{{ $project->user->name }}</span>
                                @if($project->service)
                                    — {{ $project->service->name }}
                                @endif
                            </p>
                            <p class="text-gray-500 text-xs mt-2">
                                Soumis le {{ $project->created_at->format('d/m/Y à H:i') }}
                                — Délai souhaité : {{ $project->client_deadline }} jours
                            </p>
                        </div>
                        <div class="text-right ml-6 shrink-0">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $colors[$project->status] }}">
                                {{ $labels[$project->status] }}
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>