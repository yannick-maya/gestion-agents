@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier un Responsable</h2>

    <form action="{{ route('responsables.update', $responsable->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="entreprise_id">Entreprise</label>
            <select class="form-control" id="entreprise_id" name="entreprise_id" required>
                <option value="">Sélectionner une entreprise</option>
                @foreach ($entreprises as $entreprise)
                    <option value="{{ $entreprise->id }}" {{ $responsable->entreprise_id == $entreprise->id ? 'selected' : '' }}>
                        {{ $entreprise->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $responsable->nom) }}" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom', $responsable->prenom) }}" required>
        </div>

        <div class="form-group">
            <label for="genre">Genre</label>
            <select class="form-control" id="genre" name="genre">
                <option value="M" {{ old('genre', $responsable->genre) == 'M' ? 'selected' : '' }}>Masculin</option>
                <option value="F" {{ old('genre', $responsable->genre) == 'F' ? 'selected' : '' }}>Féminin</option>
            </select>
        </div>

        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre', $responsable->titre) }}">
        </div>

        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact', $responsable->contact) }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $responsable->email) }}">
        </div>

        <div class="form-group">
            <label for="age">Âge</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $responsable->age) }}">
        </div>

        <div class="form-group">
            <label for="piece_identite">Pièce d'identité</label>
            <input type="text" class="form-control" id="piece_identite" name="piece_identite" value="{{ old('piece_identite', $responsable->piece_identite) }}">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
