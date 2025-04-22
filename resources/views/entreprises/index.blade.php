@extends('layouts.app')

@section('title', 'Liste des Entreprises')

@section('content')
<style>

    /* Style des boutons CRUD */
.btn-sm {
    font-size: 12px;
    padding: 6px 8px; /* Ajustement de la taille */
}

.btn i {
    margin-right: 5px; /* Espace entre l'icône et le texte */
}

/* Effets au survol des boutons */
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

/* Alignement des boutons */
.d-flex.gap-2 > * {
    flex: 1; /* Taille uniforme */
    text-align: center;
}

</style>

<div class="card" style="margin-left: 90px;">
    <div class="card-header">
        <h3 style="text-align:center;">Liste des Entreprises</h3>
        <a href="{{ route('entreprises.create') }}" class="btn btn-success btn-sm float-end">+ Ajouter une Entreprise</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="position: sticky; top: 0;">ID</th>
                    <th style="position: sticky; top: 0;">Nom</th>
                    <th style="position: sticky; top: 0;">Contact Téléphone</th>
                    <th style="position: sticky; top: 0;">Email</th>
                    <th style="position: sticky; top: 0;">Date de début</th>
                    <th style="position: sticky; top: 0;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entreprises as $entreprise)
                <tr>
                    <td>{{ $entreprise->id }}</td>
                    <td>{{ $entreprise->nom }}</td>
                    <td>{{ $entreprise->contact_telephone }}</td>
                    <td>{{ $entreprise->email }}</td>
                    <td>{{ $entreprise->date_debut_activite }}</td>
                    <td>
    <div class="d-flex justify-content-around align-items-center gap-2">
        <!-- Bouton Voir -->
        <a href="{{ route('entreprises.show', $entreprise->id) }}" class="btn btn-info btn-sm px-3" title="Voir">
            <i class="fas fa-eye"></i>
        </a>

        <!-- Bouton Modifier -->
        <a href="{{ route('entreprises.edit', $entreprise->id) }}" class="btn btn-warning btn-sm px-3" title="Modifier">
            <i class="fas fa-edit"></i>
        </a>

        <!-- Bouton Supprimer -->
        <form action="{{ route('entreprises.destroy', $entreprise->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette entreprise ?');">
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
@endsection
