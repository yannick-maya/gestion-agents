<!-- resources/views/secteurs/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un Nouveau Secteur</h2>

    <form action="{{ route('secteurs.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nom">Nom du Secteur</label>
            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
            @error('nom')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="{{ route('secteurs.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
