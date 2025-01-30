<?php

namespace App\Http\Controllers;

use App\Models\DossierElectoral; // Nouveau modèle utilisé
use Illuminate\Http\Request;

class CandidatureController extends Controller
{
    // Candidatures validées
    public function validees()
    {
        $dossiers = DossierElectoral::where('statut_dossier', 'validé')->with(['entreprise', 'responsable'])->get();
        return view('candidatures.validees', compact('dossiers'));
    }

    // Candidatures en attente
    public function enAttente()
    {
        $dossiers = DossierElectoral::where('statut_dossier', 'en attente')->with(['entreprise', 'responsable'])->get();
        return view('candidatures.en_attente', compact('dossiers'));
    }

    public function rejetees()
    {
        // Récupérer tous les dossiers électoraux avec le statut 'rejete'
        $dossiers = DossierElectoral::where('statut_dossier', 'rejeté')->with(['entreprise', 'responsable'])->get();
    
        return view('candidatures.rejetees', compact('dossiers'));
    }
    

}
