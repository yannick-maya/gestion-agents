@extends('layouts.app')

@section('content')
<style>

    /* Style des boutons CRUD */
.btn-sm {
    font-size: 12px;
    padding: 6px 8px;
}

.btn i {
    margin-right: 5px; /* Espace entre l'icône et le texte */
}

/* Effets au survol */
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

/* Alignement uniforme des boutons */
.d-flex.gap-2 > * {
    flex: 1;
    text-align: center;
}

</style>
<div class="container" style="margin-left:80px;">
    <h2 style="text-align:center;">Liste des Responsables</h2>

    <a href="{{ route('responsables.create') }}" class="btn btn-success mb-3">+ Ajouter un Responsable</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="position: sticky; top: 0;"> Nom</th>
                <th style="position: sticky; top: 0;">Prénom</th>
                <th style="position: sticky; top: 0;">Entreprise</th>
                <th style="position: sticky; top: 0;">Genre</th>
                <th style="position: sticky; top: 0;">Email</th>
                <th style="position: sticky; top: 0;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($responsables as $responsable)
            <tr>
                <td>{{ $responsable->nom }}</td>
                <td>{{ $responsable->prenom }}</td>
                <td>{{ $responsable->entreprise->nom }}</td>
                <td>{{ $responsable->genre == 'M' ? 'Masculin' : 'Féminin' }}</td>
                <td>{{ $responsable->email }}</td>
                <td>
    <div class="d-flex justify-content-around align-items-center gap-2">
        <!-- Bouton Voir -->
        <a href="{{ route('responsables.show', $responsable->id) }}" class="btn btn-info btn-sm px-3" title="Voir">
            <i class="fas fa-eye"></i>
        </a>

        <!-- Bouton Modifier -->
        <a href="{{ route('responsables.edit', $responsable->id) }}" class="btn btn-warning btn-sm px-3" title="Modifier">
            <i class="fas fa-edit"></i>
        </a>

        <!-- Bouton Supprimer -->
        <form action="{{ route('responsables.destroy', $responsable->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce responsable ?');">
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
@endsection
