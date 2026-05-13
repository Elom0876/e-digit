<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-digit — Connexion</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#5b8ef0">
</head>
<body class="bg-gray-950 text-white font-sans min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-md">

        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="text-3xl font-bold text-blue-400">E-digit</a>
            <p class="text-gray-500 mt-2 text-sm">Connectez-vous à votre espace</p>
        </div>

        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">

            @if(session('status'))
                <div class="bg-green-500/10 border border-green-500/30 rounded-xl p-4 mb-6">
                    <p class="text-green-400 text-sm">{{ session('status') }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-5">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-gray-400 mb-2">EMAIL</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-blue-500 transition"
                           placeholder="votre@email.com">
                    @error('email')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label class="text-sm font-semibold text-gray-400">MOT DE PASSE</label>
                        @if(Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-blue-400 text-xs hover:text-blue-300 transition">
                                Mot de passe oublié ?
                            </a>
                        @endif
                    </div>
                    <input type="password" name="password" required
                           class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-blue-500 transition"
                           placeholder="••••••••">
                    @error('password')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-3">
                    <input type="checkbox" name="remember" id="remember"
                           class="w-4 h-4 rounded border-gray-700 bg-gray-950 text-blue-500">
                    <label for="remember" class="text-sm text-gray-400">Se souvenir de moi</label>
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl transition">
                    Se connecter →
                </button>
            </form>
        </div>

        <p class="text-center text-gray-500 text-sm mt-6">
            Pas encore de compte ?
            <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-300 transition">Créer un compte</a>
        </p>
        <p class="text-center mt-4">
            <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-400 text-xs transition">← Retour à l'accueil</a>
        </p>
    </div>

</body>
</html>