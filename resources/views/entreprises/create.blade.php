@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Créer une entreprise</h2>

    <!-- Formulaire de création -->
    <form action="{{ route('entreprises.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom de l'entreprise</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
        </div>

        <div class="form-group">
            <label for="section_id">Section</label>
            <select class="form-control" id="section_id" name="section_id" required>
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}" {{ old('section_id') == $section->id ? 'selected' : '' }}>{{ $section->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="secteur_id">Secteur</label>
            <select class="form-control" id="secteur_id" name="secteur_id" required>
                @foreach ($secteurs as $secteur)
                    <option value="{{ $secteur->id }}" {{ old('secteur_id') == $secteur->id ? 'selected' : '' }}>{{ $secteur->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="lieu_inscription_id">Lieu d'inscription</label>
            <select class="form-control" id="lieu_inscription_id" name="lieu_inscription_id" required>
                @foreach ($lieux_inscription as $lieu)
                    <option value="{{ $lieu->id }}" {{ old('lieu_inscription_id') == $lieu->id ? 'selected' : '' }}>{{ $lieu->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="contact_telephone">Contact Téléphone</label>
            <input type="text" class="form-control" id="contact_telephone" name="contact_telephone" value="{{ old('contact_telephone') }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="date_debut_activite">Date de début d'activité</label>
            <input type="date" class="form-control" id="date_debut_activite" name="date_debut_activite" value="{{ old('date_debut_activite') }}">
        </div>

        <div class="form-group">
            <label for="rccm">RCCM</label>
            <input type="text" class="form-control" id="rccm" name="rccm" value="{{ old('rccm') }}">
        </div>

        <!-- Champs booléens -->
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="patente" name="patente" value="1" {{ old('patente') ? 'checked' : '' }}>
            <label class="form-check-label" for="patente">Patente</label>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="adhesion_cciama" name="adhesion_cciama" value="1" {{ old('adhesion_cciama') ? 'checked' : '' }}>
            <label class="form-check-label" for="adhesion_cciama">Adhésion CCIAMA</label>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="casier_judiciaire" name="casier_judiciaire" value="1" {{ old('casier_judiciaire') ? 'checked' : '' }}>
            <label class="form-check-label" for="casier_judiciaire">Casier judiciaire</label>
        </div>

        <div class="form-group">
            <label for="nif">NIF</label>
            <input type="text" class="form-control" id="nif" name="nif" value="{{ old('nif') }}">
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
