<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    // Afficher la liste des sections
    public function index()
    {
        // Récupérer toutes les sections
        $sections = Section::all();
        return view('sections.index', compact('sections'));
    }

    // Afficher le formulaire pour créer une nouvelle section
    public function create()
    {
        return view('sections.create');
    }

    // Enregistrer une nouvelle section
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'nom' => 'required|string|max:255|unique:sections',
            'description' => 'nullable|string|max:500',
       
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'nom.unique' => 'Ce nom est déjà utilisé.',
            'nom.max' => 'Le nom ne peut pas dépasser 255 caractères.',
        ]);
   

        // Créer la section en utilisant les données validées
        Section::create($validated);

        // Rediriger vers la page des sections avec un message de succès
        return redirect()->route('sections.index')->with('success', 'Section créée avec succès.');
    }

    // Afficher les détails d'une section spécifique
    public function show($id)
    {
        // Trouver la section par son ID
        $section = Section::findOrFail($id);
        return view('sections.show', compact('section'));
    }

    // Afficher le formulaire d'édition d'une section
    public function edit($id)
    {
        // Trouver la section à modifier
        $section = Section::findOrFail($id);
        return view('sections.edit', compact('section'));
    }

    // Mettre à jour les informations d'une section
    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'nom' => 'required|string|max:255|unique:sections',
            'description' => 'nullable|string|max:500',
       
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'nom.unique' => 'Ce nom est déjà utilisé.',
            'nom.max' => 'Le nom ne peut pas dépasser 255 caractères.',
        ]);
   

        // Trouver la section et la mettre à jour avec les nouvelles données
        $section = Section::findOrFail($id);
        $section->update($validated);

        // Rediriger vers la page des sections avec un message de succès
        return redirect()->route('sections.index')->with('success', 'Section mise à jour avec succès.');
    }

    // Supprimer une section
    public function destroy($id)
    {
        // Trouver la section à supprimer
        $section = Section::findOrFail($id);

        // Supprimer la section
        $section->delete();

        // Rediriger vers la page des sections avec un message de succès
        return redirect()->route('sections.index')->with('success', 'Section supprimée avec succès.');
    }
}
