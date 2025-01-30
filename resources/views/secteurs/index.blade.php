<!-- resources/views/secteurs/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Secteurs</h2>
    <a href="{{ route('secteurs.create') }}" class="btn btn-primary">Ajouter un Secteur</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th style="position: sticky; top: 0;">ID</th>
                <th style="position: sticky; top: 0;">Nom</th>
                <th style="position: sticky; top: 0;"Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($secteurs as $secteur)
                <tr>
                    <td>{{ $secteur->id }}</td>
                    <td>{{ $secteur->nom }}</td>
                    <td>
                        <a href="{{ route('secteurs.edit', $secteur->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('secteurs.destroy', $secteur->id) }}" method="POST" style="display:inline;">
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
