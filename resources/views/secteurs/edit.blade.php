<!-- resources/views/secteurs/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier le Secteur</h2>

    <form action="{{ route('secteurs.update', $secteur->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">Nom du Secteur</label>
            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $secteur->nom) }}">
            @error('nom')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('secteurs.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
