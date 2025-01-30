<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    // Affiche la liste des responsables
    public function index()
    {
        $responsables = Responsable::with('entreprise')->get();
        return view('responsables.index', compact('responsables'));
    }

    // Affiche le formulaire pour créer un responsable
    public function create()
    {
        $entreprises = Entreprise::all();  // Liste des entreprises pour le choix
        return view('responsables.create', compact('entreprises'));
    }

    // Sauvegarde un nouveau responsable
    public function store(Request $request)
    {
        $request->validate(Responsable::rules());

        Responsable::create($request->all());

        return redirect()->route('responsables.index')->with('success', 'Responsable ajouté avec succès!');
    }

    // Affiche un responsable spécifique
    public function show($id)
    {
        $responsable = Responsable::with('entreprise')->findOrFail($id);
        return view('responsables.show', compact('responsable'));
    }

    // Affiche le formulaire pour éditer un responsable
    public function edit($id)
    {
        $responsable = Responsable::findOrFail($id);
        $entreprises = Entreprise::all(); // Liste des entreprises
        return view('responsables.edit', compact('responsable', 'entreprises'));
    }

    // Met à jour un responsable existant
    public function update(Request $request, $id)
    {
        $request->validate(Responsable::rules());

        $responsable = Responsable::findOrFail($id);
        $responsable->update($request->all());

        return redirect()->route('responsables.index')->with('success', 'Responsable mis à jour avec succès!');
    }

    // Supprime un responsable
    public function destroy($id)
    {
        $responsable = Responsable::findOrFail($id);
        $responsable->delete();

        return redirect()->route('responsables.index')->with('success', 'Responsable supprimé avec succès!');
    }
}
