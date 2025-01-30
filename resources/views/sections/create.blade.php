@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Créer une Section</h2>
    <form action="{{ route('sections.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
            @error('nom')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
        <a href="{{ route('sections.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
