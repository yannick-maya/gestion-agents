<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Secteur;
use App\Models\Section;
use App\Models\LieuInscription;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    // Afficher la liste des entreprises
    public function index()
    {
        $entreprises = Entreprise::all();
        return view('entreprises.index', compact('entreprises'));
    }

    // Afficher le formulaire pour créer une nouvelle entreprise
    public function create()
    {
        // Récupérer les secteurs, sections et lieux d'inscription pour les afficher dans les formulaires
        $secteurs = Secteur::all();
        $sections = Section::all();
        $lieux_inscription = LieuInscription::all();
        
        return view('entreprises.create', compact('secteurs', 'sections', 'lieux_inscription'));
    }

    // Enregistrer une nouvelle entreprise
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'secteur_id' => 'required|exists:secteurs,id',
            'section_id' => 'required|exists:sections,id',
            'lieu_inscription_id' => 'required|exists:lieux_inscription,id',
            'contact_telephone' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'date_debut_activite' => 'nullable|date',
            'rccm' => 'nullable|string|max:255',
            'patente' => 'nullable|boolean',
            'adhesion_cciama' => 'nullable|boolean',
            'casier_judiciaire' => 'nullable|boolean',
            'nif' => 'nullable|string|max:255',
        ], [
            'nom.required' => 'Le nom de l\'entreprise est obligatoire.',
            'nom.max' => 'Le nom de l\'entreprise ne peut pas dépasser 255 caractères.',
            'secteur_id.required' => 'Le secteur est obligatoire.',
            'secteur_id.exists' => 'Le secteur sélectionné est invalide.',
            'section_id.required' => 'La section est obligatoire.',
            'section_id.exists' => 'La section sélectionnée est invalide.',
            'lieu_inscription_id.required' => 'Le lieu d\'inscription est obligatoire.',
            'lieu_inscription_id.exists' => 'Le lieu d\'inscription sélectionné est invalide.',
            'contact_telephone.max' => 'Le numéro de téléphone ne peut pas dépasser 20 caractères.',
            'email.email' => 'L\'adresse e-mail n\'est pas valide.',
            'date_debut_activite.date' => 'La date de début d\'activité n\'est pas valide.',
            'rccm.max' => 'Le RCCM ne peut pas dépasser 255 caractères.',
            'nif.max' => 'Le NIF ne peut pas dépasser 255 caractères.',
        ]);

        // Créer l'entreprise en utilisant les données validées
        Entreprise::create($validated);

        // Rediriger vers la page des entreprises avec un message de succès
        return redirect()->route('entreprises.index')->with('success', 'Entreprise créée avec succès.');
    }

    // Afficher les détails d'une entreprise spécifique
    public function show($id)
    {
        // Trouver l'entreprise par son ID
        $entreprise = Entreprise::findOrFail($id);
        return view('entreprises.show', compact('entreprise'));
    }

    // Afficher le formulaire d'édition d'une entreprise
    public function edit($id)
    {
        // Trouver l'entreprise à modifier
        $entreprise = Entreprise::findOrFail($id);
        
        // Récupérer les secteurs, sections et lieux d'inscription pour les afficher dans le formulaire
        $secteurs = Secteur::all();
        $sections = Section::all();
        $lieux_inscription = LieuInscription::all();

        return view('entreprises.edit', compact('entreprise', 'secteurs', 'sections', 'lieux_inscription'));
    }

    // Mettre à jour les informations d'une entreprise
    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'nom' => 'required|string|max:255|unique:entreprise',
            'secteur_id' => 'required|exists:secteurs,id',
            'section_id' => 'required|exists:sections,id',
            'lieu_inscription_id' => 'required|exists:lieux_inscription,id',
            'contact_telephone' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'date_debut_activite' => 'nullable|date',
            'rccm' => 'nullable|string|max:255',
            'patente' => 'nullable|boolean',
            'adhesion_cciama' => 'nullable|boolean',
            'casier_judiciaire' => 'nullable|boolean',
            'nif' => 'nullable|string|max:255',
        ], [
            'nom.required' => 'Le nom de l\'entreprise est obligatoire.',
            'nom.required' => 'Le nom de l\'entreprise deja eistant.',
            'nom.max' => 'Le nom de l\'entreprise ne peut pas dépasser 255 caractères.',
            'secteur_id.required' => 'Le secteur est obligatoire.',
            'secteur_id.exists' => 'Le secteur sélectionné est invalide.',
            'section_id.required' => 'La section est obligatoire.',
            'section_id.exists' => 'La section sélectionnée est invalide.',
            'lieu_inscription_id.required' => 'Le lieu d\'inscription est obligatoire.',
            'lieu_inscription_id.exists' => 'Le lieu d\'inscription sélectionné est invalide.',
            'contact_telephone.max' => 'Le numéro de téléphone ne peut pas dépasser 20 caractères.',
            'email.email' => 'L\'adresse e-mail n\'est pas valide.',
            'date_debut_activite.date' => 'La date de début d\'activité n\'est pas valide.',
            'rccm.max' => 'Le RCCM ne peut pas dépasser 255 caractères.',
            'nif.max' => 'Le NIF ne peut pas dépasser 255 caractères.',
        ]);

        // Trouver l'entreprise et la mettre à jour avec les nouvelles données
        $entreprise = Entreprise::findOrFail($id);
        $entreprise->update($validated);

        // Rediriger vers la page des entreprises avec un message de succès
        return redirect()->route('entreprises.index')->with('success', 'Entreprise mise à jour avec succès.');
    }

    // Supprimer une entreprise
    public function destroy($id)
    {
        // Trouver l'entreprise à supprimer
        $entreprise = Entreprise::findOrFail($id);

        // Supprimer l'entreprise
        $entreprise->delete();

        // Rediriger vers la page des entreprises avec un message de succès
        return redirect()->route('entreprises.index')->with('success', 'Entreprise supprimée avec succès.');
    }
}
