<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    @include('partials.header')
    <div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1>Connexion</h1>

            @if (session('error'))
                <div class="alert-error">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div >
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div>
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div>
                <label>
                    <input type="checkbox" name="remember" value="1"> Se souvenir de moi
                </label>
            </div>

            <div>
                <button type="submit" class="button primary">Se connecter</button>
                <a href="{{ route('register') }}" class="button secondary">Créer un compte</a>
            </div>
        </form>
    </div>
    @include('partials.footer')
</body>
</html>
