<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-digit — Mes projets</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#5b8ef0">
</head>
<body class="bg-gray-950 text-white font-sans">

    <nav class="fixed w-full z-50 bg-gray-950/90 backdrop-blur border-b border-gray-800">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-400">E-digit</a>
            <a href="{{ route('client.dashboard') }}" class="text-gray-400 hover:text-white transition text-sm">
                ← Retour au dashboard
            </a>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-6 pt-28 pb-16">

        <div class="flex justify-between items-center mb-10">
            <h1 class="text-3xl font-bold">Mes projets</h1>
            <a href="{{ route('client.projects.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition">
                + Nouveau projet
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-500/10 border border-green-500/30 rounded-xl p-4 mb-6">
                <p class="text-green-400">{{ session('success') }}</p>
            </div>
        @endif

        @if($projects->isEmpty())
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-16 text-center">
                <p class="text-5xl mb-4">📋</p>
                <h2 class="text-xl font-bold mb-2">Aucun projet pour l'instant</h2>
                <a href="{{ route('client.projects.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition inline-block mt-4">
                    Soumettre un projet
                </a>
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
                    <a href="{{ route('client.projects.show', $project) }}"
                       class="bg-gray-900 border border-gray-800 hover:border-blue-500 rounded-2xl p-6 flex justify-between items-center transition">
                        <div>
                            <h3 class="font-bold text-lg">{{ $project->title }}</h3>
                            <p class="text-gray-400 text-sm mt-1">{{ Str::limit($project->description, 80) }}</p>
                            <p class="text-gray-500 text-xs mt-2">Délai demandé : {{ $project->client_deadline }} jours</p>
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
</html><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-digit — Mes projets</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#5b8ef0">
</head>
<body class="bg-gray-950 text-white font-sans">

    <nav class="fixed w-full z-50 bg-gray-950/90 backdrop-blur border-b border-gray-800">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-400">E-digit</a>
            <a href="{{ route('client.dashboard') }}" class="text-gray-400 hover:text-white transition text-sm">
                ← Retour au dashboard
            </a>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-6 pt-28 pb-16">

        <div class="flex justify-between items-center mb-10">
            <h1 class="text-3xl font-bold">Mes projets</h1>
            <a href="{{ route('client.projects.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition">
                + Nouveau projet
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-500/10 border border-green-500/30 rounded-xl p-4 mb-6">
                <p class="text-green-400">{{ session('success') }}</p>
            </div>
        @endif

        @if($projects->isEmpty())
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-16 text-center">
                <p class="text-5xl mb-4">📋</p>
                <h2 class="text-xl font-bold mb-2">Aucun projet pour l'instant</h2>
                <a href="{{ route('client.projects.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition inline-block mt-4">
                    Soumettre un projet
                </a>
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
                    <a href="{{ route('client.projects.show', $project) }}"
                       class="bg-gray-900 border border-gray-800 hover:border-blue-500 rounded-2xl p-6 flex justify-between items-center transition">
                        <div>
                            <h3 class="font-bold text-lg">{{ $project->title }}</h3>
                            <p class="text-gray-400 text-sm mt-1">{{ Str::limit($project->description, 80) }}</p>
                            <p class="text-gray-500 text-xs mt-2">Délai demandé : {{ $project->client_deadline }} jours</p>
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