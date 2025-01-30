@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Lieux d'Inscription</h2>
    <a href="{{ route('lieux_inscription.create') }}" class="btn btn-primary mb-3">Ajouter un Lieu</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lieuxInscription as $lieu)
                <tr>
                    <td>{{ $lieu->id }}</td>
                    <td>{{ $lieu->nom }}</td>
                    <td>
                        <a href="{{ route('lieux_inscription.show', $lieu->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('lieux_inscription.edit', $lieu->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('lieux_inscription.destroy', $lieu->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
