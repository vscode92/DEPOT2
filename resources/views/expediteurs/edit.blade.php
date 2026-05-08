@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'Expéditeur</h1>
    <form action="{{ route('expediteurs.update', $expediteur->id_expediteur) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" name="nom" value="{{ $expediteur->nom }}" required>
        </div>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" name="adresse" value="{{ $expediteur->adresse }}" required>
        </div>
        <div class="form-group">
            <label for="telephone_expediteur">Téléphone</label>
            <input type="text" class="form-control" name="telephone_expediteur" value="{{ $expediteur->telephone_expediteur }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $expediteur->email }}" required>
        </div>
        <div class="form-group">
            <label for="Id_service">Service</label>
            <select class="form-control" name="Id_service" required>
                <!-- Remplis avec les services disponibles -->
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Mettre à jour</button>
    </form>
</div>
@endsection