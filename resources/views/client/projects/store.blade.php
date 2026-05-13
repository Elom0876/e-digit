<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-digit — {{ $project->title }}</title>
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

    <div class="max-w-3xl mx-auto px-6 pt-28 pb-16">

        @php
            $colors = [
                'pending'     => 'bg-yellow-500/10 text-yellow-400 border-yellow-500/30',
                'validated'   => 'bg-blue-500/10 text-blue-400 border-blue-500/30',
                'rejected'    => 'bg-red-500/10 text-red-400 border-red-500/30',
                'in_progress' => 'bg-purple-500/10 text-purple-400 border-purple-500/30',
                'completed'   => 'bg-green-500/10 text-green-400 border-green-500/30',
            ];
            $labels = [
                'pending'     => '⏳ En attente de validation',
                'validated'   => '✅ Projet validé',
                'rejected'    => '❌ Projet refusé',
                'in_progress' => '🚀 En cours de développement',
                'completed'   => '🎉 Projet terminé',
            ];
        @endphp

        <div class="border rounded-2xl p-6 mb-8 {{ $colors[$project->status] }}">
            <p class="font-bold text-lg">{{ $labels[$project->status] }}</p>
            @if($project->status === 'pending')
                <p class="text-sm mt-1 opacity-70">Votre projet est en cours d'examen. Vous serez notifié par email.</p>
            @endif
        </div>

        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8 mb-6">
            <h1 class="text-2xl font-bold mb-6">{{ $project->title }}</h1>
            <div class="flex flex-col gap-4">
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
                    <p class="text-gray-500 text-xs font-semibold uppercase mb-1">Date de soumission</p>
                    <p class="text-white">{{ $project->created_at->format('d/m/Y à H:i') }}</p>
                </div>
            </div>
        </div>

        @if(in_array($project->status, ['validated', 'in_progress', 'completed']))
            <div class="bg-blue-500/10 border border-blue-500/30 rounded-2xl p-8">
                <h2 class="text-xl font-bold text-blue-400 mb-6">Réponse de E-digit</h2>
                <div class="flex flex-col gap-4">
                    @if($project->validated_price)
                        <div>
                            <p class="text-gray-500 text-xs font-semibold uppercase mb-1">Prix validé</p>
                            <p class="text-3xl font-bold text-white">{{ number_format($project->validated_price, 0, ',', ' ') }} FCFA</p>
                        </div>
                    @endif
                    @if($project->validated_deadline)
                        <div>
                            <p class="text-gray-500 text-xs font-semibold uppercase mb-1">Délai validé</p>
                            <p class="text-white text-xl font-semibold">{{ $project->validated_deadline }} jours</p>
                        </div>
                    @endif
                    @if($project->admin_note)
                        <div>
                            <p class="text-gray-500 text-xs font-semibold uppercase mb-1">Message de E-digit</p>
                            <p class="text-gray-300 leading-relaxed">{{ $project->admin_note }}</p>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        @if($project->status === 'rejected' && $project->admin_note)
            <div class="bg-red-500/10 border border-red-500/30 rounded-2xl p-8">
                <h2 class="text-xl font-bold text-red-400 mb-4">Motif du refus</h2>
                <p class="text-gray-300">{{ $project->admin_note }}</p>
            </div>
        @endif

    </div>
</body>
</html> 