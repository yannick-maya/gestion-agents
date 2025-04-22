@extends('layouts.app')

@section('content')
<div class="container" style="margin-left: 200px;">
    <h2 style="text-align:center;">Liste des Sections</h2>
    <a href="{{ route('sections.create') }}" class="btn btn-success mb-3">Ajouter une Section</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody style="text-align:center;">
            @foreach ($sections as $section)
                <tr>
                    <td>{{ $section->id }}</td>
                    <td>{{ $section->nom }}</td>
                    <td>
                        <a href="{{ route('sections.show', $section->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display:inline;">
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
