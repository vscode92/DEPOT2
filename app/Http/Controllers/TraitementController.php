<?php

namespace App\Http\Controllers;
use App\Models\Traitement;
use Illuminate\Http\Request;

class TraitementController extends Controller
{
   public function index()
    {
        $traitements = Traitement::all();
        return view('traitements.index', compact('traitements'));
    }

    public function create()
    {
        return view('traitements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'action' => 'required',
            'commentaire' => 'nullable',
            'Date_traitement' => 'required|date',
            'Id_courrier' => 'required|exists:courriers,id_courrier',
            'Id_utilisateur' => 'required|exists:utilisateurs,id_utilisateur',
        ]);

        Traitement::create($request->all());
        return redirect()->route('traitements.index')->with('success', 'Traitement créé avec succès.');
    }

    public function show(Traitement $traitement)
    {
        return view('traitements.show', compact('traitement'));
    }

    public function edit(Traitement $traitement)
    {
        return view('traitements.edit', compact('traitement'));
    }

    public function update(Request $request, Traitement $traitement)
    {
        $request->validate([
            'action' => 'required',
            'commentaire' => 'nullable',
        ]);

        $traitement->update($request->all());
        return redirect()->route('traitements.index')->with('success', 'Traitement mis à jour avec succès.');
    }

    public function destroy(Traitement $traitement)
    {
        $traitement->delete();
        return redirect()->route('traitements.index')->with('success', 'Traitement supprimé avec succès.');
    }
}
