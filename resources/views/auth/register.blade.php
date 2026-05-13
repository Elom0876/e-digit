<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-digit — Inscription</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#5b8ef0">
</head>
<body class="bg-gray-950 text-white font-sans min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-md">

        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="text-3xl font-bold text-blue-400">E-digit</a>
            <p class="text-gray-500 mt-2 text-sm">Créez votre espace client</p>
        </div>

        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">
            <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-5">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-gray-400 mb-2">NOM COMPLET</label>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus
                           class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-blue-500 transition"
                           placeholder="John Doe">
                    @error('name')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-400 mb-2">EMAIL</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-blue-500 transition"
                           placeholder="votre@email.com">
                    @error('email')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-400 mb-2">MOT DE PASSE</label>
                    <input type="password" name="password" required
                           class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-blue-500 transition"
                           placeholder="••••••••">
                    @error('password')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-400 mb-2">CONFIRMER LE MOT DE PASSE</label>
                    <input type="password" name="password_confirmation" required
                           class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-blue-500 transition"
                           placeholder="••••••••">
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl transition">
                    Créer mon compte →
                </button>
            </form>
        </div>

        <p class="text-center text-gray-500 text-sm mt-6">
            Déjà un compte ?
            <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-300 transition">Se connecter</a>
        </p>
        <p class="text-center mt-4">
            <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-400 text-xs transition">← Retour à l'accueil</a>
        </p>
    </div>

</body>
</html>