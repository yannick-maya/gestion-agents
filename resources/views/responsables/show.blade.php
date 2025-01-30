@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails du Responsable</h2>

    <div class="card">
        <div class="card-header">
            <h3>{{ $responsable->nom }} {{ $responsable->prenom }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Entreprise :</strong> {{ $responsable->entreprise->nom }}</p>
            <p><strong>Genre :</strong> {{ $responsable->genre == 'M' ? 'Masculin' : 'Féminin' }}</p>
            <p><strong>Titre :</strong> {{ $responsable->titre }}</p>
            <p><strong>Contact :</strong> {{ $responsable->contact }}</p>
            <p><strong>Email :</strong> {{ $responsable->email }}</p>
            <p><strong>Âge :</strong> {{ $responsable->age }}</p>
            <p><strong>Pièce d'identité :</strong> {{ $responsable->piece_identite }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('responsables.edit', $responsable->id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('responsables.destroy', $responsable->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            <a href="{{ route('responsables.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
