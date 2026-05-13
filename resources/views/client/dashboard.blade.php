<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-digit — Mon Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#5b8ef0">
</head>
<body class="bg-gray-950 text-white font-sans">

    <nav class="fixed w-full z-50 bg-gray-950/90 backdrop-blur border-b border-gray-800">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-400">E-digit</a>
            <div class="flex items-center gap-4">
                <span class="text-gray-400 text-sm hidden md:block">{{ Auth::user()->name }}</span>
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

        @if(session('success'))
            <div class="bg-green-500/10 border border-green-500/30 rounded-xl p-4 mb-6">
                <p class="text-green-400">{{ session('success') }}</p>
            </div>
        @endif

        <div class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-3xl font-bold">Bonjour, {{ Auth::user()->name }} 👋</h1>
                <p class="text-gray-400 mt-1">Gérez vos projets et suivez leur avancement</p>
            </div>
            <a href="{{ route('client.projects.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition">
                + Nouveau projet
            </a>
        </div>

        @php
            $total = $projects->count();
            $pending = $projects->where('status', 'pending')->count();
            $validated = $projects->where('status', 'validated')->count();
            $completed = $projects->where('status', 'completed')->count();
        @endphp

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
                <p class="text-gray-400 text-sm">Total</p>
                <p class="text-3xl font-bold mt-1">{{ $total }}</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
                <p class="text-gray-400 text-sm">En attente</p>
                <p class="text-3xl font-bold mt-1 text-yellow-400">{{ $pending }}</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
                <p class="text-gray-400 text-sm">Validés</p>
                <p class="text-3xl font-bold mt-1 text-blue-400">{{ $validated }}</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
                <p class="text-gray-400 text-sm">Terminés</p>
                <p class="text-3xl font-bold mt-1 text-green-400">{{ $completed }}</p>
            </div>
        </div>

        @if($projects->isEmpty())
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-16 text-center">
                <p class="text-5xl mb-4">📋</p>
                <h2 class="text-xl font-bold mb-2">Aucun projet pour l'instant</h2>
                <p class="text-gray-400 mb-6">Soumettez votre premier projet et recevez une réponse sous 24h.</p>
                <a href="{{ route('client.projects.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition inline-block">
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
                            @if($project->validated_price)
                                <p class="text-white font-bold mt-2">{{ number_format($project->validated_price, 0, ',', ' ') }} FCFA</p>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>