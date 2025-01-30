@extends('layouts.app')

@section('content')
<div class="container mt-4" style="padding:30px">
    <h2>Résultat(s) de Recherche</h2>

    @if($dossiers->isEmpty())
        <p>Aucun résultat trouvé.</p>
    @else
       <table class="table table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>N°</th>
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
                    @foreach ($dossiers as $dossier)
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
    @endif
</div>
@endsection
