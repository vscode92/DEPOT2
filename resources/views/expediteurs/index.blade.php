@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Expéditeurs</h1>
    <a href="{{ route('expediteurs.create') }}" class="btn btn-primary">Ajouter un Expéditeur</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expediteurs as $expediteur)
                <tr>
                    <td>{{ $expediteur->nom }}</td>
                    <td>{{ $expediteur->adresse }}</td>
                    <td>{{ $expediteur->telephone_expediteur }}</td>
                    <td>{{ $expediteur->email }}</td>
                    <td>
                        <a href="{{ route('expediteurs.edit', $expediteur->id_expediteur) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('expediteurs.destroy', $expediteur->id_expediteur) }}" method="POST" style="display:inline;">
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