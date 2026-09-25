<div class="field">
    <label for="name">Nom</label>
    <input id="name" type="text" name="name" value="{{ old('name', $user->name ?? '') }}" required>
</div>

<div class="field">
    <label for="email">Email</label>
    <input id="email" type="email" name="email" value="{{ old('email', $user->email ?? '') }}" required>
</div>

<div class="field">
    <label for="access_level">Niveau d’accès</label>
    <select id="access_level" name="access_level" required>
        @foreach(['user' => 'Utilisateur', 'artist' => 'Artiste', 'admin' => 'Administrateur'] as $level => $label)
            <option value="{{ $level }}" @selected(old('access_level', $user->access_level ?? 'user') === $level)>{{ $label }}</option>
        @endforeach
    </select>
</div>

<div class="field">
    <label for="boutique_id">Boutique associée</label>
    <select id="boutique_id" name="boutique_id">
        <option value="">Aucune</option>
        @foreach($boutiques as $boutique)
            <option value="{{ $boutique->id }}" @selected((string) old('boutique_id', $user->boutique_id ?? '') === (string) $boutique->id)>{{ $boutique->name }}</option>
        @endforeach
    </select>
</div>

<div class="field">
    <label for="password">Mot de passe @if(!empty($editing))(laisser vide pour conserver l’actuel)@endif</label>
    <input id="password" type="password" name="password" @required(empty($editing))>
</div>

