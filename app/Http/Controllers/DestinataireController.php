<?php

namespace App\Http\Controllers;
use App\Models\Destinataire;
use Illuminate\Http\Request;

class DestinataireController extends Controller
{
   public function index()
    {
        $destinataires = Destinataire::all();
        return view('destinataires.index', compact('destinataires'));
    }

    public function create()
    {
        return view('destinataires.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'telephone_destinataire' => 'required',
            'email' => 'required|email',
            'Id_service' => 'required|exists:services,id_service',
        ]);

        Destinataire::create($request->all());
        return redirect()->route('destinataires.index')->with('success', 'Destinataire créé avec succès.');
    }

    public function show(Destinataire $destinataire)
    {
        return view('destinataires.show', compact('destinataire'));
    }

    public function edit(Destinataire $destinataire)
    {
        return view('destinataires.edit', compact('destinataire'));
    }

    public function update(Request $request, Destinataire $destinataire)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'telephone_destinataire' => 'required',
            'email' => 'required|email',
            'Id_service' => 'required|exists:services,id_service',
        ]);

        $destinataire->update($request->all());
        return redirect()->route('destinataires.index')->with('success', 'Destinataire mis à jour avec succès.');
    }

    public function destroy(Destinataire $destinataire)
    {
        $destinataire->delete();
        return redirect()->route('destinataires.index')->with('success', 'Destinataire supprimé avec succès.');
    }
}
