@extends('layouts.app')

@section('content')
<div class="container formulaire-bg">
    <h1 class="mb-4">Créer un Nouveau Dossier Électoral</h1>
    <form action="{{ route('dossiers_electoraux.store') }}" method="POST">
        @csrf
        <div class="row">
            <!-- Entreprise -->
            <div class="col-md-6 mb-3">
                <label for="entreprise_id" class="form-label">Entreprise</label>
                <select name="entreprise_id" id="entreprise_id" class="form-select" required>
                    <option value="">Sélectionner une entreprise</option>
                    @foreach ($entreprises as $entreprise)
                        <option value="{{ $entreprise->id }}">{{ $entreprise->nom }}</option>
                    @endforeach
                </select>
            </div>
            
            <!-- Responsable -->
            <div class="col-md-6 mb-3">
                <label for="responsable_id" class="form-label">Responsable</label>
                <select name="responsable_id" id="responsable_id" class="form-select" required>
                    <option value="">Sélectionner un responsable</option>
                    @foreach ($responsables as $responsable)
                        <option value="{{ $responsable->id }}">{{ $responsable->nom }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <!-- Section -->
            <div class="col-md-6 mb-3">
                <label for="section_id" class="form-label">Section</label>
                <select name="section_id" id="section_id" class="form-select" required>
                    <option value="">Sélectionner une section</option>
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->nom }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Secteur -->
            <div class="col-md-6 mb-3">
                <label for="secteur_id" class="form-label">Secteur</label>
                <select name="secteur_id" id="secteur_id" class="form-select" required>
                    <option value="">Sélectionner un secteur</option>
                    @foreach ($secteurs as $secteur)
                        <option value="{{ $secteur->id }}">{{ $secteur->nom }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <!-- Lieu d'inscription -->
            <div class="col-md-6 mb-3">
                <label for="lieu_inscription_id" class="form-label">Lieu d'Inscription</label>
                <select name="lieu_inscription_id" id="lieu_inscription_id" class="form-select" required>
                    <option value="">Sélectionner un lieu</option>
                    @foreach ($lieux_inscription as $lieu)
                        <option value="{{ $lieu->id }}">{{ $lieu->nom }}</option>
                    @endforeach
                </select>
            </div>
            
            <!-- Date de Dépôt -->
            <div class="col-md-6 mb-3">
                <label for="date_depot" class="form-label">Date de Dépôt</label>
                <input type="date" name="date_depot" id="date_depot" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <!-- Statut -->
            <div class="col-md-6 mb-3">
                <label for="statut_dossier" class="form-label">Statut du Dossier</label>
                <select name="statut_dossier" id="statut_dossier" class="form-select" required>
                    <option value="en attente">En attente</option>
                    <option value="validé">Validé</option>
                    <option value="rejeté">Rejeté</option>
                </select>
            </div>

            <!-- Est candidat -->
            <div class="col-md-6 mb-3">
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="est_candidat" name="est_candidat" value="1">
                    <label class="form-check-label" for="est_candidat">Est candidat</label>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Quitus Fiscal -->
            <div class="col-md-4 mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="quitus_fiscal" name="quitus_fiscal" value="1">
                    <label class="form-check-label" for="quitus_fiscal">Quitus Fiscal</label>
                </div>
            </div>
            
            <!-- Attestation Inscription -->
            <div class="col-md-4 mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="attestation_inscription" name="attestation_inscription" value="1">
                    <label class="form-check-label" for="attestation_inscription">Attestation Inscription</label>
                </div>
            </div>

            <!-- Non-Faillite -->
            <div class="col-md-4 mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="attestation_non_faillite" name="attestation_non_faillite" value="1">
                    <label class="form-check-label" for="attestation_non_faillite">Non-Faillite</label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <!-- Commentaires -->
            <label for="commentaires" class="form-label">Commentaires</label>
            <textarea name="commentaires" id="commentaires" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
