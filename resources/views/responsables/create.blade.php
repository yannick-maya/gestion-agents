@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un Responsable</h2>

    <form action="{{ route('responsables.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="entreprise_id">Entreprise</label>
            <select class="form-control" id="entreprise_id" name="entreprise_id" required>
                <option value="">Sélectionner une entreprise</option>
                @foreach ($entreprises as $entreprise)
                    <option value="{{ $entreprise->id }}" {{ old('entreprise_id') == $entreprise->id ? 'selected' : '' }}>
                        {{ $entreprise->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
        </div>

        <div class="form-group">
            <label for="genre">Genre</label>
            <select class="form-control" id="genre" name="genre">
                <option value="M" {{ old('genre') == 'M' ? 'selected' : '' }}>Masculin</option>
                <option value="F" {{ old('genre') == 'F' ? 'selected' : '' }}>Féminin</option>
            </select>
        </div>

        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre') }}">
        </div>

        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact') }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="age">Âge</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ old('age') }}">
        </div>

        <div class="form-group">
            <label for="piece_identite">NNI (Pièce d'identité) </label>
            <input type="text" class="form-control" id="piece_identite" name="piece_identite" value="{{ old('piece_identite') }}">
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
