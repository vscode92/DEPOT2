<?php

namespace App\Http\Controllers;
use App\Models\Expediteur;
use Illuminate\Http\Request;

class ExpediteurController extends Controller
{
    public function index()
    {
        $expediteurs = Expediteur::all();
        return view('expediteurs.index', compact('expediteurs'));
    }

    public function create()
    {
        return view('expediteurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'telephone_expediteur' => 'required',
            'email' => 'required|email',
            'Id_service' => 'required|exists:services,id_service',
        ]);

        Expediteur::create($request->all());
        return redirect()->route('expediteurs.index')->with('success', 'Expéditeur créé avec succès.');
    }

    public function show(Expediteur $expediteur)
    {
        return view('expediteurs.show', compact('expediteur'));
    }

    public function edit(Expediteur $expediteur)
    {
        return view('expediteurs.edit', compact('expediteur'));
    }

    public function update(Request $request, Expediteur $expediteur)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'telephone_expediteur' => 'required',
            'email' => 'required|email',
            'Id_service' => 'required|exists:services,id_service',
        ]);

        $expediteur->update($request->all());
        return redirect()->route('expediteurs.index')->with('success', 'Expéditeur mis à jour avec succès.');
    }

    public function destroy(Expediteur $expediteur)
    {
        $expediteur->delete();
        return redirect()->route('expediteurs.index')->with('success', 'Expéditeur supprimé avec succès.');
    }
}
