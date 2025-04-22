@extends('layouts.app')

@section('content')
<style>
  /* Style personnalisé pour les boutons */
.btn-sm {
    font-size: 12px;
    padding: 6px 8px;
}

.btn i {
    margin-right: 5px;
}

/* Effet hover */
.btn-info:hover {
    background-color: #3498db;
    color: #fff;
}

.btn-warning:hover {
    background-color: #f39c12;
    color: #fff;
}

.btn-danger:hover {
    background-color: #e74c3c;
    color: #fff;
}

/* Alignement et espacement */
.d-flex.gap-2 > * {
    flex: 1; /* Assure une taille équilibrée */
    text-align: center;
}


    /* Style pour les champs de filtre */
    .form-select, .form-label {
        font-size: 14px;
    }

    .table-container {
        margin-top: 20px;
    }

    .filter-section {
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        background-color: #f8f9fa;
        padding: 20px;
    }

    /* Style pour les champs de filtre */
    .form-select, .form-label {
        font-size: 14px;
    }

    .table-container {
        margin-top: 20px;
    }
    
</style>

<div class="container mt-4">
  
     <!-- Titre principal -->
     <h2 class="mb-4 text-center" style=" position:fd;  font-family: 'Poppins', sans-serif; font-weight: 600;">
        Liste des Dossiers Électoraux
    </h2>

    <!-- Section de filtrage des critères -->
    <div class="filter-section mb-4" style="top:100px;">
        <h5 class="text-center mb-3" style="color: #2980B9; font-weight: bold;">
            <i class="fas fa-filter"></i> Filtrer les Dossiers
        </h5>
        <form method="GET" action="{{ route('dossiers_electoraux.index') }}">
            <div class="row g-3">
                <!-- Filtre par Secteur -->
                <div class="col-md-3">
                    <label for="secteur" class="form-label">Secteur</label>
                    <select name="secteur_id" id="secteur" class="form-select">
                        <option value="">Tous</option>
                        @foreach($secteurs as $secteur)
                            <option value="{{ $secteur->id }}" {{ request('secteur_id') == $secteur->id ? 'selected' : '' }}>
                                {{ $secteur->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Filtre par Section -->
                <div class="col-md-3">
                    <label for="section" class="form-label">Section</label>
                    <select name="section_id" id="section" class="form-select">
                        <option value="">Toutes</option>
                        @foreach($sections as $section)
                            <option value="{{ $section->id }}" {{ request('section_id') == $section->id ? 'selected' : '' }}>
                                {{ $section->nom }}
                            </option>
                        @endforeach
                    
               
</select>
                </div>

                <!-- Filtre par Statut -->
                <div class="col-md-3">
                    <label for="statut" class="form-label">Statut</label>
                    <select name="statut_dossier" id="statut" class="form-select">
                        <option value="">Tous</option>
                        <option value="validé" {{ request('statut_dossier') == 'validé' ? 'selected' : '' }}>Validé</option>
                        <option value="rejeté" {{ request('statut_dossier') == 'rejeté' ? 'selected' : '' }}>Rejeté</option>
                        
          
<option value="en attente" {{ request('statut_dossier') == 'en attente' ? 'selected' : '' }}>En Attente</option>
                    </select>
                </div>

                <!-- Boutons Appliquer et Réinitialiser -->
                <div class="col-md-3 d-flex align-items-end gap-2">
                    <button type="submit" class="btn btn-primary w-50">
                        <i class="fas fa-check"></i> V
                        alider
                    </button>
                    <a href="{{ route('dossiers_electoraux.index') }}" class="btn btn-secondary w-50">
                        <i class="fas fa-times"></i> Annuler
                    </a>
                </div>
            </div>
        </form>
    </div>
      <!-- Lien pour créer un dossier -->
      <a href="{{ route('dossiers_electoraux.create') }}" style="margin-left:200px" class="btn btn-success mb-3">
        <i class="fas fa-plus-circle"></i> Créer un Nouveau Dossier
    </a>

    <!-- Tableau des dossiers -->
    <div class="table-container">
        <div class="table-responsive" style="max-height: 400px;">
            <table class="table table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Entreprise</th>
                        <th>Responsable</th>
                        <th>Section</th>
                        <th>Secteur</th>
                        <th>Date de Dépôt</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dossiers_electoraux as $dossier)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dossier->entreprise->nom ?? 'Non spécifié' }}</td>
                            <td>{{ $dossier->responsable->nom ?? 'Non spécifié' }} {{ $dossier->responsable->prenom ?? 'Non spécifié' }}</td>
                            <td>{{ $dossier->section->nom ?? 'Non spécifiée' }}</td>
                            <td>{{ $dossier->secteur->nom ?? 'Non spécifié' }}</td>
                            <td>{{ \Carbon\Carbon::parse($dossier->date_depot)->format('d/m/Y') }}</td>
                            <td>{{ ucfirst($dossier->statut_dossier) }}</td>
                             <td>
                            <div class="d-flex justify-content-around align-items-center gap-2">
                                <!-- Bouton Voir -->
                                <a href="{{ route('dossiers_electoraux.show', $dossier->id) }}" class="btn btn-info btn-sm px-3" title="Voir">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <!-- Bouton Modifier -->
                                <a href="{{ route('dossiers_electoraux.edit', $dossier->id) }}" class="btn btn-warning btn-sm px-3" title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Bouton Supprimer -->
                                <form action="{{ route('dossiers_electoraux.destroy', $dossier->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce dossier ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm px-3" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
