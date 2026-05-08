<?php

namespace App\Http\Controllers;
use App\Models\Archive;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function index()
    {
        $archives = Archive::all();
        return view('archives.index', compact('archives'));
    }

    public function create()
    {
        return view('archives.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Date_archive' => 'required|date',
            'Type_archive' => 'required',
            'Id_courrier' => 'required|exists:courriers,id_courrier',
        ]);

        Archive::create($request->all());
        return redirect()->route('archives.index')->with('success', 'Archive créée avec succès.');
    }

    public function show(Archive $archive)
    {
        return view('archives.show', compact('archive'));
    }

    public function edit(Archive $archive)
    {
        return view('archives.edit', compact('archive'));
    }

    public function update(Request $request, Archive $archive)
    {
        $request->validate([
            'Date_archive' => 'required|date',
            'Type_archive' => 'required',
        ]);

        $archive->update($request->all());
        return redirect()->route('archives.index')->with('success', 'Archive mise à jour avec succès.');
    }

    public function destroy(Archive $archive)
    {
        $archive->delete();
        return redirect()->route('archives.index')->with('success', 'Archive supprimée avec succès.');
    }
}
