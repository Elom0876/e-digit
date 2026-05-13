<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-digit — Nouveau projet</title>
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
        <div class="mb-8">
            <h1 class="text-3xl font-bold">Nouveau projet</h1>
            <p class="text-gray-400 mt-1">Décrivez votre projet en détail pour recevoir une réponse rapide.</p>
        </div>

        @if($errors->any())
            <div class="bg-red-500/10 border border-red-500/30 rounded-xl p-4 mb-6">
                @foreach($errors->all() as $error)
                    <p class="text-red-400 text-sm">• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('client.projects.store') }}">
            @csrf
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8 flex flex-col gap-6">

                <div>
                    <label class="block text-sm font-semibold text-gray-400 mb-2">TITRE DU PROJET</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                           placeholder="Ex : Application mobile de livraison"
                           class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-blue-500 transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-400 mb-2">TYPE DE SERVICE</label>
                    <select name="service_id"
                            class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                        <option value="">-- Choisissez un service --</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                {{ $service->icon }} {{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-400 mb-2">DESCRIPTION DU PROJET</label>
                    <textarea name="description" rows="6"
                              placeholder="Décrivez votre projet en détail : fonctionnalités souhaitées, public cible, plateformes visées..."
                              class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-blue-500 transition resize-none">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-400 mb-2">DÉLAI SOUHAITÉ (en jours)</label>
                    <input type="number" name="client_deadline" value="{{ old('client_deadline') }}"
                           min="1" placeholder="Ex : 30"
                           class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-blue-500 transition">
                    <p class="text-gray-600 text-xs mt-2">Nombre de jours dans lequel vous souhaitez recevoir votre projet.</p>
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl transition text-lg">
                    Soumettre mon projet →
                </button>

            </div>
        </form>
    </div>
</body>
</html>