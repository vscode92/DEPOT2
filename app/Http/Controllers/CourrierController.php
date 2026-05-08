<?php

namespace App\Http\Controllers;
use App\Models\Courrier;
use Illuminate\Http\Request;

class CourrierController extends Controller
{
   public function index()
    {
        $courriers = Courrier::all();
        return view('courriers.index', compact('courriers'));
    }

    public function create()
    {
        return view('courriers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Numero_courrier' => 'required',
            'Objet' => 'required',
            'Type' => 'required',
            'Date_creation' => 'required|date',
            'Statut' => 'required',
            'Id_expediteur' => 'required|exists:expediteurs,id_expediteur',
            'Id_destinataire' => 'required|exists:destinataires,id_destinataire',
        ]);

        Courrier::create($request->all());
        return redirect()->route('courriers.index')->with('success', 'Courrier créé avec succès.');
    }

    public function show(Courrier $courrier)
    {
        return view('courriers.show', compact('courrier'));
    }

    public function edit(Courrier $courrier)
    {
        return view('courriers.edit', compact('courrier'));
    }

    public function update(Request $request, Courrier $courrier)
    {
        $request->validate([
            'Numero_courrier' => 'required',
            'Objet' => 'required',
            'Type' => 'required',
            'Date_creation' => 'required|date',
            'Statut' => 'required',
        ]);

        $courrier->update($request->all());
        return redirect()->route('courriers.index')->with('success', 'Courrier mis à jour avec succès.');
    }

    public function destroy(Courrier $courrier)
    {
        $courrier->delete();
        return redirect()->route('courriers.index')->with('success', 'Courrier supprimé avec succès.');
    }
}
