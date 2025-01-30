<?php

namespace App\Http\Controllers;

use App\Models\LieuInscription;
use Illuminate\Http\Request;

class LieuInscriptionController extends Controller
{    protected $table = 'lieux_inscription';
    // Afficher la liste des lieux d'inscription
    public function index()
    {
        // Récupérer tous les lieux d'inscription
        $lieuxInscription = LieuInscription::all();
        return view('lieux_inscription.index', compact('lieuxInscription'));
    }

    // Afficher le formulaire pour créer un nouveau lieu d'inscription
    public function create()
    {
        return view('lieux_inscription.create');
    }

    // Enregistrer un nouveau lieu d'inscription
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'nom' => 'required|string|max:255|unique:lieux_inscription', // Correction du nom de la table
            'description' => 'nullable|string|max:500',
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'nom.unique' => 'Ce nom est déjà utilisé.',
            'nom.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'description.max' => 'La description ne peut pas dépasser 500 caractères.',
        ]);

        // Créer le lieu d'inscription en utilisant les données validées
        LieuInscription::create($validated);

        // Rediriger vers la page des lieux d'inscription avec un message de succès
        return redirect()->route('lieux_inscription.index')->with('success', 'Lieu d\'inscription créé avec succès.');
    }

    // Afficher les détails d'un lieu d'inscription spécifique
    public function show($id)
    {
        // Trouver le lieu d'inscription par son ID
        $lieuInscription = LieuInscription::findOrFail($id);
        return view('lieux_inscription.show', compact('lieuInscription'));
    }

    // Afficher le formulaire d'édition d'un lieu d'inscription
    public function edit($id)
    {
        // Trouver le lieu d'inscription à modifier
        $lieuInscription = LieuInscription::findOrFail($id);
        return view('lieux_inscription.edit', compact('lieuInscription'));
    }

    // Mettre à jour les informations d'un lieu d'inscription
    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'nom' => 'required|string|max:255|unique:lieux_inscription,nom,' . $id, // Ajout de l'exception pour l'édition
            'description' => 'nullable|string|max:500',
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'nom.unique' => 'Ce nom est déjà utilisé.',
            'nom.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'description.max' => 'La description ne peut pas dépasser 500 caractères.',
        ]);

        // Trouver le lieu d'inscription et le mettre à jour avec les nouvelles données
        $lieuInscription = LieuInscription::findOrFail($id);
        $lieuInscription->update($validated);

        // Rediriger vers la page des lieux d'inscription avec un message de succès
        return redirect()->route('lieux_inscription.index')->with('success', 'Lieu d\'inscription mis à jour avec succès.');
    }

    // Supprimer un lieu d'inscription
    public function destroy($id)
    {
        // Trouver le lieu d'inscription à supprimer
        $lieuInscription = LieuInscription::findOrFail($id);

        // Supprimer le lieu d'inscription
        $lieuInscription->delete();

        // Rediriger vers la page des lieux d'inscription avec un message de succès
        return redirect()->route('lieux_inscription.index')->with('success', 'Lieu d\'inscription supprimé avec succès.');
    }
}
