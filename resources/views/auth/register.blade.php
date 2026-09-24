<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>

    <div class="form-shell">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1 class="form-title">Créer un compte</h1>

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
                <label for="name">Nom</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="field">
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div class="field">
                <label for="password_confirmation">Confirmation</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <div class="actions-row">
                <button type="submit" class="button primary">S'inscrire</button>
                <a href="{{ route('login') }}" class="back">J'ai déjà un compte</a>
            </div>
        </form>
    </div>
</body>
</html>
