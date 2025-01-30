@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails du Lieu d'Inscription</h2>
    <div class="card mt-3">
   
        <div class="card-header">
            
            <h3>{{ $lieuInscription->nom }}</h3>
        </div>
        <div class="card-body">
            <p><strong>ID :</strong> {{ $lieuInscription->id }}</p>
            <p><strong>Nom :</strong> {{ $lieuInscription->nom }}</p>
            <p><strong>Date de création :</strong> {{ $lieuInscription->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Dernière mise à jour :</strong> {{ $lieuInscription->updated_at->format('d/m/Y H:i') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('lieux_inscription.index') }}" class="btn btn-secondary">Retour à la liste</a>
            <a href="{{ route('lieux_inscription.edit', $lieuInscription->id) }}" class="btn btn-warning">Modifier</a>
        </div>
    </div>
</div>
@endsection
