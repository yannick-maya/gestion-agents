@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails de la Section</h2>
    <div class="card mt-3">
        <div class="card-header">
            <h3>{{ $section->nom }}</h3>
        </div>
        <div class="card-body">
            <p><strong>ID :</strong> {{ $section->id }}</p>
            <p><strong>Nom :</strong> {{ $section->nom }}</p>
            <p><strong>Date de création :</strong> {{ $section->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Dernière mise à jour :</strong> {{ $section->updated_at->format('d/m/Y H:i') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('sections.index') }}" class="btn btn-secondary">Retour à la liste</a>
            <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-warning">Modifier</a>
        </div>
    </div>
</div>
@endsection
