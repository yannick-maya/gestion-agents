<!-- resources/views/secteurs/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails du Secteur</h2>

    <div class="card mt-3">
        <div class="card-header">
            <h3>{{ $secteur->nom }}</h3>
        </div>
        <div class="card-body">
            <p><strong>ID :</strong> {{ $secteur->id }}</p>
            <p><strong>Nom :</strong> {{ $secteur->nom }}</p>
            <p><strong>Date de création :</strong> {{ $secteur->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Dernière mise à jour :</strong> {{ $secteur->updated_at->format('d/m/Y H:i') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('secteurs.index') }}" class="btn btn-secondary">Retour à la liste</a>
            <a href="{{ route('secteurs.edit', $secteur->id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('secteurs.destroy', $secteur->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection
