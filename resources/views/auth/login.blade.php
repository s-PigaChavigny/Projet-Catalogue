<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div class="form-shell">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1 class="form-title">Connexion</h1>

            @if (session('error'))
                <div class="alert-error">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="field">
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div class="field checkbox-row">
                <label>
                    <input type="checkbox" name="remember" value="1"> Se souvenir de moi
                </label>
            </div>

            <div class="actions-row">
                <button type="submit" class="button primary">Se connecter</button>
                <a href="{{ route('register') }}" class="back">Créer un compte</a>
            </div>
        </form>
    </div>
</body>
</html>
