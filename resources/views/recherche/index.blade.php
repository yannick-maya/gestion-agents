@extends('layouts.app')

@section('title', 'Résultats de recherche')

@section('content')
    <h1>Résultats pour : "{{ $searchTerm }}"</h1>

    @if ($dossiers->isEmpty() && $entreprises->isEmpty() && $responsables->isEmpty())
        <p>Aucun résultat trouvé pour "{{ $searchTerm }}".</p>
    @else
        <h2>Dossiers Électoraux</h2>
        @forelse ($dossiers as $dossier)
            <p>{{ $dossier->nom }}</p>
        @empty
            <p>Aucun dossier trouvé.</p>
        @endforelse

        <h2>Entreprises</h2>
        @forelse ($entreprises as $entreprise)
            <p>{{ $entreprise->nom }}</p>
        @empty
            <p>Aucune entreprise trouvée.</p>
        @endforelse

        <h2>Responsables</h2>
        @forelse ($responsables as $responsable)
            <p>{{ $responsable->nom }}</p>
        @empty
            <p>Aucun responsable trouvé.</p>
        @endforelse
    @endif
@endsection
