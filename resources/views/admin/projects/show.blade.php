<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-digit Admin — {{ $project->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#5b8ef0">
</head>
<body class="bg-gray-950 text-white font-sans">

    <nav class="fixed w-full z-50 bg-gray-950/90 backdrop-blur border-b border-gray-800">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <span class="text-2xl font-bold text-blue-400">E-digit <span class="text-xs text-gray-500 font-normal ml-2">ADMIN</span></span>
            <div class="flex items-center gap-6">
                <a href="{{ route('admin.projects.index') }}" class="text-gray-400 hover:text-white text-sm transition">
                    ← Retour aux projets
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-gray-800 hover:bg-gray-700 text-gray-300 hover:text-white px-4 py-2 rounded-lg text-sm transition">
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="max-w-3xl mx-auto px-6 pt-28 pb-16">

        @if(session('success'))
            <div class="bg-green-500/10 border border-green-500/30 rounded-xl p-4 mb-6">
                <p class="text-green-400">{{ session('success') }}</p>
            </div>
        @endif

        @php
            $colors = [
                'pending'     => 'bg-yellow-500/10 text-yellow-400 border-yellow-500/30',
                'validated'   => 'bg-blue-500/10 text-blue-400 border-blue-500/30',
                'rejected'    => 'bg-red-500/10 text-red-400 border-red-500/30',
                'in_progress' => 'bg-purple-500/10 text-purple-400 border-purple-500/30',
                'completed'   => 'bg-green-500/10 text-green-400 border-green-500/30',
            ];
            $labels = [
                'pending'     => 'En attente',
                'validated'   => 'Validé',
                'rejected'    => 'Refusé',
                'in_progress' => 'En cours',
                'completed'   => 'Terminé',
            ];
        @endphp

        {{-- INFOS PROJET --}}
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8 mb-6">
            <div class="flex justify-between items-start mb-6">
                <h1 class="text-2xl font-bold">{{ $project->title }}</h1>
                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $colors[$project->status] }}">
                    {{ $labels[$project->status] }}
                </span>
            </div>
            <div class="flex flex-col gap-4">
                <div>
                    <p class="text-gray-500 text-xs font-semibold uppercase mb-1">Client</p>
                    <p class="text-white">{{ $project->user->name }} — {{ $project->user->email }}</p>
                </div>
                @if($project->service)
                    <div>
                        <p class="text-gray-500 text-xs font-semibold uppercase mb-1">Service</p>
                        <p class="text-white">{{ $project->service->icon }} {{ $project->service->name }}</p>
                    </div>
                @endif
                <div>
                    <p class="text-gray-500 text-xs font-semibold uppercase mb-1">Description</p>
                    <p class="text-gray-300 leading-relaxed">{{ $project->description }}</p>
                </div>
                <div>
                    <p class="text-gray-500 text-xs font-semibold uppercase mb-1">Délai souhaité</p>
                    <p class="text-white">{{ $project->client_deadline }} jours</p>
                </div>
                <div>
                    <p class="text-gray-500 text-xs font-semibold uppercase mb-1">Soumis le</p>
                    <p class="text-white">{{ $project->created_at->format('d/m/Y à H:i') }}</p>
                </div>
            </div>
        </div>

        @if($project->status === 'pending')

            {{-- FORMULAIRE VALIDATION --}}
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8 mb-6">
                <h2 class="text-xl font-bold mb-6 text-blue-400">✅ Valider le projet</h2>
                <form method="POST" action="{{ route('admin.projects.validate', $project) }}">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-400 mb-2">PRIX VALIDÉ (FCFA)</label>
                            <input type="number" name="validated_price" min="0"
                                   placeholder="Ex : 250000"
                                   class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-blue-500 transition">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-400 mb-2">DÉLAI VALIDÉ (jours)</label>
                            <input type="number" name="validated_deadline" min="1"
                                   placeholder="Ex : 30"
                                   class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-blue-500 transition">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-400 mb-2">NOTE POUR LE CLIENT (optionnel)</label>
                            <textarea name="admin_note" rows="3"
                                      placeholder="Message à transmettre au client..."
                                      class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-blue-500 transition resize-none"></textarea>
                        </div>
                        <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl transition">
                            ✅ Valider ce projet
                        </button>
                    </div>
                </form>
            </div>

            {{-- FORMULAIRE REFUS --}}
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">
                <h2 class="text-xl font-bold mb-6 text-red-400">❌ Refuser le projet</h2>
                <form method="POST" action="{{ route('admin.projects.reject', $project) }}">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-400 mb-2">MOTIF DU REFUS</label>
                            <textarea name="admin_note" rows="3" required
                                      placeholder="Expliquez pourquoi le projet est refusé..."
                                      class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-red-500 transition resize-none"></textarea>
                        </div>
                        <button type="submit"
                                class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-4 rounded-xl transition">
                            ❌ Refuser ce projet
                        </button>
                    </div>
                </form>
            </div>

        @else
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">
                <h2 class="text-xl font-bold mb-4">Réponse donnée</h2>
                @if($project->validated_price)
                    <p class="text-gray-400 text-sm mb-1">Prix validé</p>
                    <p class="text-2xl font-bold mb-4">{{ number_format($project->validated_price, 0, ',', ' ') }} FCFA</p>
                @endif
                @if($project->validated_deadline)
                    <p class="text-gray-400 text-sm mb-1">Délai validé</p>
                    <p class="text-xl font-semibold mb-4">{{ $project->validated_deadline }} jours</p>
                @endif
                @if($project->admin_note)
                    <p class="text-gray-400 text-sm mb-1">Note</p>
                    <p class="text-gray-300">{{ $project->admin_note }}</p>
                @endif
            </div>
        @endif

    </div>
</body>
</html>