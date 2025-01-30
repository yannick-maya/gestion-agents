@extends('layouts.app')

@section('title', 'Détails de l\'Entreprise')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Détails de l'Entreprise</h3>
    </div>
    <div class="card-body">
        <p><strong>Nom :</strong> {{ $entreprise->nom }}</p>
        <p><strong>Contact Téléphone :</strong> {{ $entreprise->contact_telephone }}</p>
        <p><strong>Email :</strong> {{ $entreprise->email }}</p>
        <p><strong>Date de Début :</strong> {{ $entreprise->date_debut_activite }}</p>
        <!-- Affichez les autres champs ici -->
        <a href="{{ route('entreprises.index') }}" class="btn btn-secondary">Retour</a>
    </div>
</div>
@endsection
