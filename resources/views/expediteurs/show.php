@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de l'Expéditeur</h1>
    <p><strong>Nom :</strong> {{ $expediteur->nom }}</p>
    <p><strong>Adresse :</strong> {{ $expediteur->adresse }}</p>
    <p><strong>Téléphone :</strong> {{ $expediteur->telephone_expediteur }}</p>
    <p><strong>Email :</strong> {{ $expediteur->email }}</p>
    <p><strong>Service :</strong> {{ $expediteur->service->Nom_service }}</p>
    <a href="{{ route('expediteurs.edit', $expediteur->id_expediteur) }}" class="btn btn-warning">Modifier</a>
    <form action="{{ route('expediteurs.destroy', $expediteur->id_expediteur) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
    <a href="{{ route('expediteurs.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection