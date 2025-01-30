@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier une Section</h2>
    <form action="{{ route('sections.update', $section->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $section->nom) }}">
            @error('nom')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('sections.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
