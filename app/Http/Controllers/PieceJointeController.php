<?php

namespace App\Http\Controllers;
use App\Models\PieceJointe;
use Illuminate\Http\Request;

class PieceJointeController extends Controller
{
    public function index()
    {
        $fichiers = PieceJointe::all();
        return view('pieces_jointes.index', compact('fichiers'));
    }

    public function create()
    {
        return view('pieces_jointes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nom_fichier' => 'required',
            'Type_fichier' => 'required',
            'chemin' => 'required',
            'taille' => 'required|integer',
            'Id_courrier' => 'required|exists:courriers,id_courrier',
        ]);

        PieceJointe::create($request->all());
        return redirect()->route('pieces_jointes.index')->with('success', 'Pièce jointe créée avec succès.');
    }

    public function show(PieceJointe $pieceJointe)
    {
        return view('pieces_jointes.show', compact('pieceJointe'));
    }

    public function edit(PieceJointe $pieceJointe)
    {
        return view('pieces_jointes.edit', compact('pieceJointe'));
    }

    public function update(Request $request, PieceJointe $pieceJointe)
    {
        $request->validate([
            'Nom_fichier' => 'required',
            'Type_fichier' => 'required',
            'chemin' => 'required',
            'taille' => 'required|integer',
        ]);

        $pieceJointe->update($request->all());
        return redirect()->route('pieces_jointes.index')->with('success', 'Pièce jointe mise à jour avec succès.');
    }

    public function destroy(PieceJointe $pieceJointe)
    {
        $pieceJointe->delete();
        return redirect()->route('pieces_jointes.index')->with('success', 'Pièce jointe supprimée avec succès.');
    }
}
