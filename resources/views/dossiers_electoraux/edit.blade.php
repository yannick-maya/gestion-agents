@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier un Dossier Électoral</h2>
   
    <form action="{{ route('dossiers_electoraux.update', $dossier->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="entreprise_id">Entreprise</label>
            <select name="entreprise_id" id="entreprise_id" class="form-control @error('entreprise_id') is-invalid @enderror">
                <option value="">Sélectionnez une entreprise</option>
                @foreach ($entreprises as $entreprise)
                    <option value="{{ $entreprise->id }}" {{ $dossier->entreprise_id == $entreprise->id ? 'selected' : '' }}>
                        {{ $entreprise->nom }}
                    </option>
                @endforeach
            </select>
            @error('entreprise_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="responsable_id">Responsable</label>
            <select name="responsable_id" id="responsable_id" class="form-control @error('responsable_id') is-invalid @enderror">
                <option value="">Sélectionnez un responsable</option>
                @foreach ($responsables as $responsable)
                    <option value="{{ $responsable->id }}" {{ $dossier->responsable_id == $responsable->id ? 'selected' : '' }}>
                        {{ $responsable->nom }} {{ $responsable->prenom }}
                    </option>
                @endforeach
            </select>
            @error('responsable_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="section_id">Section</label>
            <select name="section_id" id="section_id" class="form-control @error('section_id') is-invalid @enderror">
                <option value="">Sélectionnez une section</option>
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}" {{ $dossier->section_id == $section->id ? 'selected' : '' }}>
                        {{ $section->nom }}
                    </option>
                @endforeach
            </select>
            @error('section_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="secteur_id">Secteur</label>
            <select name="secteur_id" id="secteur_id" class="form-control @error('secteur_id') is-invalid @enderror">
                <option value="">Sélectionnez un secteur</option>
                @foreach ($secteurs as $secteur)
                    <option value="{{ $secteur->id }}" {{ $dossier->secteur_id == $secteur->id ? 'selected' : '' }}>
                        {{ $secteur->nom }}
                    </option>
                @endforeach
            </select>
            @error('secteur_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="date_depot">Date de Dépôt</label>
            <input type="date" name="date_depot" id="date_depot" class="form-control @error('date_depot') is-invalid @enderror" value="{{ old('date_depot', $dossier->date_depot) }}">
            @error('date_depot')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        < <div class="form-group">
            <label for="statut_dossier" class="form-label">Statut</label>
            <select name="statut_dossier" id="statut_dossier" class="form-select" required>
                <option value="en attente" {{ $dossier->statut_dossier == 'en attente' ? 'selected' : '' }}>En Attente</option>
                <option value="validé" {{ $dossier->statut_dossier == 'validé' ? 'selected' : '' }}>Validé</option>
                <option value="rejeté" {{ $dossier->statut_dossier == 'rejeté' ? 'selected' : '' }}>Rejeté</option>
            </select>
        </div>

        <div class="form-group">
            <label for="commentaires">Commentaires</label>
            <textarea name="commentaires" id="commentaires" class="form-control @error('commentaires') is-invalid @enderror" rows="4">{{ old('commentaires', $dossier->commentaires) }}</textarea>
            @error('commentaires')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('dossiers_electoraux.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
    
</div>
@endsection
