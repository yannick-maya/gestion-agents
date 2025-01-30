@extends('layouts.app')

@section('content')
<div class="container my-4">
    <!-- Titre de la page -->
    <div class="row">
        <div class="col">
            <h2 class="display-4 text-center text-warning">Candidatures en Attente</h2>
        </div>
    </div>

    <!-- Table avec design amélioré et taille réduite -->
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="width: 5%;">ID</th>
                    <th scope="col" style="width: 15%;">Entreprise</th>
                    <th scope="col" style="width: 20%;">Email de l'Entreprise</th>
                    <th scope="col" style="width: 15%;">Responsable</th>
                    <th scope="col" style="width: 20%;">Email du Responsable</th>
                    <th scope="col" style="width: 10%;">Age</th>
                    <th scope="col" style="width: 10%;">Date de Dépôt</th>
                    <th scope="col" style="width: 10%;">Commentaires</th>
                    <th scope="col" style="width: 10%;">Statut</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dossiers as $dossier)
                    @if($dossier->statut_dossier == 'en attente')
                        <tr>
                            <td class="small">{{ $dossier->id }}</td>
                            <td class="small">{{ $dossier->entreprise->nom ?? 'N/A' }}</td>
                            <td class="small">{{ $dossier->entreprise->email ?? 'N/A' }}</td>
                            <td class="small">{{ $dossier->responsable->nom ?? 'N/A' }}</td>
                            <td class="small">{{ $dossier->responsable->email ?? 'N/A' }}</td>
                            <td class="small">{{ $dossier->responsable->age ?? 'N/A' }}</td>
                            <td class="small">{{ \Carbon\Carbon::parse($dossier->date_depot)->format('d/m/Y') }}</td>
                            <td class="small">{{ $dossier->commentaires }}</td>
                            <td>
                                <span class="badge bg-warning">
                                    En Attente
                                </span>
                            </td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted">
                            <i>Aucune candidature en attente trouvée.</i>
                        </td>
                    </tr>
                @endforelse
            </tbody> <!-- Option d'exportation (exemple) -->
    <div class="d-flex justify-content-end mt-4">
        <a href="#" class="btn btn-danger btn-sm">
            <i class="fas fa-file-download"></i> Exporter la liste
        </a>
    </div>
        </table>
    </div>
</div>
@endsection
