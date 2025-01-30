@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails du Dossier Électoral</h1>

    <div class="card">
        <div class="card-header">
            <h3>Informations générales</h3>
        </div>
        <div class="card-body">
            <p><strong>Entreprise :</strong> {{ $dossier->entreprise->nom ?? 'Non spécifiée' }}</p>
            <p><strong>Responsable :</strong> {{ $dossier->responsable->nom ?? 'Non spécifié' }}</p>
            <p><strong>Section :</strong> {{ $dossier->section->nom ?? 'Non spécifiée' }}</p>
            <p><strong>Secteur :</strong> {{ $dossier->secteur->nom ?? 'Non spécifié' }}</p>
            <p><strong>Date de Dépôt :</strong> {{ $dossier->date_depot }}</p>
            <p><strong>Statut :</strong> {{ ucfirst($dossier->statut_dossier) }}</p>
        </div>

        <div class="card-header">
            <h3>Critères de Validation</h3>
        </div>
        <div class="card-body">
            <p><strong>Acte de Candidature :</strong> {{ $dossier->acte_candidature ? 'Oui' : 'Non' }}</p>
            <p><strong>Reçu des Droits de Candidature :</strong> {{ $dossier->recu_droit_candidature ? 'Oui' : 'Non' }}</p>
            <p><strong>Attestation d'Inscription :</strong> {{ $dossier->attestation_inscription ? 'Oui' : 'Non' }}</p>
            <p><strong>Quitus Fiscal :</strong> {{ $dossier->quitus_fiscal ? 'Oui' : 'Non' }}</p>
            <p><strong>Attestation de Non-Faillite :</strong> {{ $dossier->attestation_non_faillite ? 'Oui' : 'Non' }}</p>
        </div>

        <div class="card-header">
            <h3>Autres Informations</h3>
        </div>
        <div class="card-body">
            <p><strong>Commentaire :</strong> {{ $dossier->commentaires ?? 'Aucun commentaire' }}</p>
            <p><strong>Créé le :</strong> {{ $dossier->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Dernière mise à jour :</strong> {{ $dossier->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('dossiers_electoraux.index') }}" class="btn btn-primary mt-3">Retour à la liste</a>
</div>
@endsection
