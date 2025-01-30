<?php

namespace App\Http\Controllers;

use App\Models\Secteur;
use Illuminate\Http\Request;

class SecteurController extends Controller
{
    // Afficher la liste des secteurs
    public function index()
    {
        // Récupérer tous les secteurs
        $secteurs = Secteur::all();
        return view('secteurs.index', compact('secteurs'));
    }

    // Afficher le formulaire pour créer un nouveau secteur
    public function create()
    {
        return view('secteurs.create');
    }

    // Enregistrer un nouveau secteur
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'nom' => 'required|string|max:255|unique:secteurs',
            'description' => 'nullable|string|max:500',
       
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'nom.unique' => 'Ce nom est déjà utilisé.',
            'nom.max' => 'Le nom ne peut pas dépasser 255 caractères.',
        ]);
   

        // Créer le secteur en utilisant les données validées
        Secteur::create($validated);

        // Rediriger vers la page des secteurs avec un message de succès
        return redirect()->route('secteurs.index')->with('success', 'Secteur créé avec succès.');
    }

    // Afficher les détails d'un secteur spécifique
    public function show($id)
    {
        // Trouver le secteur par son ID
        $secteur = Secteur::findOrFail($id);
        return view('secteurs.show', compact('secteur'));
    }

    // Afficher le formulaire d'édition d'un secteur
    public function edit($id)
    {
        // Trouver le secteur à modifier
        $secteur = Secteur::findOrFail($id);
        return view('secteurs.edit', compact('secteur'));
    }

    // Mettre à jour les informations d'un secteur
    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'nom' => 'required|string|max:255|unique:secteurs',
            'description' => 'nullable|string|max:500',
       
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'nom.unique' => 'Ce nom est déjà utilisé.',
            'nom.max' => 'Le nom ne peut pas dépasser 255 caractères.',
        ]);
   
        // Trouver le secteur et le mettre à jour avec les nouvelles données
        $secteur = Secteur::findOrFail($id);
        $secteur->update($validated);

        // Rediriger vers la page des secteurs avec un message de succès
        return redirect()->route('secteurs.index')->with('success', 'Secteur mis à jour avec succès.');
    }

    // Supprimer un secteur
    public function destroy($id)
    {
        // Trouver le secteur à supprimer
        $secteur = Secteur::findOrFail($id);

        // Supprimer le secteur
        $secteur->delete();

        // Rediriger vers la page des secteurs avec un message de succès
        return redirect()->route('secteurs.index')->with('success', 'Secteur supprimé avec succès.');
    }
}
