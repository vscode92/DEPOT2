<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::all();
        return view('notifications.index', compact('notifications'));
    }

    public function create()
    {
        return view('notifications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'Date_envoi' => 'required|date',
            'Statut' => 'required',
            'Id_courrier' => 'required|exists:courriers,id_courrier',
            'Id_utilisateur' => 'required|exists:utilisateurs,id_utilisateur',
        ]);

        Notification::create($request->all());
        return redirect()->route('notifications.index')->with('success', 'Notification créée avec succès.');
    }

    public function show(Notification $notification)
    {
        return view('notifications.show', compact('notification'));
    }

    public function edit(Notification $notification)
    {
        return view('notifications.edit', compact('notification'));
    }

    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'message' => 'required',
            'Date_envoi' => 'required|date',
            'Statut' => 'required',
        ]);

        $notification->update($request->all());
        return redirect()->route('notifications.index')->with('success', 'Notification mise à jour avec succès.');
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();
        return redirect()->route('notifications.index')->with('success', 'Notification supprimée avec succès.');
    }
}
