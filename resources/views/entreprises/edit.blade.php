@extends('layouts.app')

@section('title', 'Modifier une Entreprise')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Modifier l'Entreprise</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('entreprises.update', $entreprise->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nom" class="form-label">Nom de l'Entreprise</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ $entreprise->nom }}" required>
            </div>
            <div class="mb-3">
                <label for="contact_telephone" class="form-label">Contact Téléphone</label>
                <input type="text" name="contact_telephone" id="contact_telephone" class="form-control" value="{{ $entreprise->contact_telephone }}">
            </div>
            <!-- Ajoutez les autres champs comme dans la vue create -->
            <button type="submit" class="btn btn-success">Mettre à jour</button>
        </form>
    </div>
</div>
@endsection
