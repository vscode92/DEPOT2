<?php

namespace App\Http\Controllers;
use App\Models\Affectation;
use Illuminate\Http\Request;

class AffectationController extends Controller
{
    public function index()
    {
        $affectations = Affectation::all();
        return view('affectations.index', compact('affectations'));
    }

    public function create()
    {
        return view('affectations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Date_affectation' => 'required|date',
            'Statut' => 'required',
            'Id_courrier' => 'required|exists:courriers,id_courrier',
            'Id_service' => 'required|exists:services,id_service',
            'Id_utilisateur' => 'required|exists:utilisateurs,id_utilisateur',
        ]);

        Affectation::create($request->all());
        return redirect()->route('affectations.index')->with('success', 'Affectation créée avec succès.');
    }

    public function show(Affectation $affectation)
    {
        return view('affectations.show', compact('affectation'));
    }

    public function edit(Affectation $affectation)
    {
        return view('affectations.edit', compact('affectation'));
    }

    public function update(Request $request, Affectation $affectation)
    {
        $request->validate([
            'Date_affectation' => 'required|date',
            'Statut' => 'required',
        ]);

        $affectation->update($request->all());
        return redirect()->route('affectations.index')->with('success', 'Affectation mise à jour avec succès.');
    }

    public function destroy(Affectation $affectation)
    {
        $affectation->delete();
        return redirect()->route('affectations.index')->with('success', 'Affectation supprimée avec succès.');
    }
}
