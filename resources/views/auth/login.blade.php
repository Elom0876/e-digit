<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-digit — Connexion</title>
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#5b8ef0">
    <style>
        *,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
        body{font-family:"Segoe UI",sans-serif;background:#030712;color:#fff;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:16px}
        .wrap{width:100%;max-width:420px}
        .logo{text-align:center;margin-bottom:32px}
        .logo a{font-size:1.8rem;font-weight:800;color:#60a5fa;text-decoration:none}
        .logo p{color:#6b7280;margin-top:6px;font-size:0.875rem}
        .card{background:#111827;border:1px solid #1f2937;border-radius:16px;padding:32px}
        .form{display:flex;flex-direction:column;gap:20px}
        .field label{display:block;font-size:0.75rem;font-weight:600;color:#9ca3af;margin-bottom:8px;letter-spacing:0.05em}
        .field input{width:100%;background:#030712;border:1px solid #374151;border-radius:10px;padding:12px 16px;color:#fff;font-size:0.9rem;outline:none;transition:border-color 0.2s}
        .field input:focus{border-color:#3b82f6}
        .field input::placeholder{color:#4b5563}
        .field-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:8px}
        .field-header label{font-size:0.75rem;font-weight:600;color:#9ca3af;letter-spacing:0.05em}
        .field-header a{font-size:0.75rem;color:#60a5fa;text-decoration:none}
        .field-header a:hover{color:#93c5fd}
        .remember{display:flex;align-items:center;gap:10px;color:#9ca3af;font-size:0.875rem}
        .remember input{width:16px;height:16px}
        .error{color:#f87171;font-size:0.75rem;margin-top:4px}
        .success{background:rgba(16,185,129,0.1);border:1px solid rgba(16,185,129,0.3);border-radius:10px;padding:12px 16px;color:#34d399;font-size:0.875rem;margin-bottom:16px}
        .btn{width:100%;background:#2563eb;color:#fff;font-weight:700;padding:14px;border:none;border-radius:10px;font-size:1rem;cursor:pointer;transition:background 0.2s}
        .btn:hover{background:#1d4ed8}
        .footer{text-align:center;margin-top:20px;color:#6b7280;font-size:0.875rem}
        .footer a{color:#60a5fa;text-decoration:none}
        .footer a:hover{color:#93c5fd}
        .back{text-align:center;margin-top:12px}
        .back a{color:#4b5563;font-size:0.75rem;text-decoration:none}
        .back a:hover{color:#9ca3af}
    </style>
</head>
<body>
    <div class="wrap">
        <div class="logo">
            <a href="{{ route('home') }}">E-digit</a>
            <p>Connectez-vous à votre espace</p>
        </div>

        <div class="card">
            @if(session('status'))
                <div class="success">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="form">
                @csrf

                <div class="field">
                    <label>EMAIL</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="votre@email.com">
                    @error('email')<p class="error">{{ $message }}</p>@enderror
                </div>

                <div class="field">
                    <div class="field-header">
                        <label>MOT DE PASSE</label>
                        @if(Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                        @endif
                    </div>
                    <input type="password" name="password" required placeholder="••••••••">
                    @error('password')<p class="error">{{ $message }}</p>@enderror
                </div>

                <div class="remember">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Se souvenir de moi</label>
                </div>

                <button type="submit" class="btn">Se connecter →</button>
            </form>
        </div>

        <p class="footer">
            Pas encore de compte ? <a href="{{ route('register') }}">Créer un compte</a>
        </p>
        <div class="back">
            <a href="{{ route('home') }}">← Retour à l'accueil</a>
        </div>
    </div>
</body>
</html>