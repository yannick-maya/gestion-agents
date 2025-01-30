<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DossierElectoral;
class AdminController extends Controller
{
    // public function index()
    // {
    //     $validCandidatures = 10; // Exemple de données à récupérer depuis la base de données
    //     $pendingCandidatures = 5;
    //     $rejectedCandidatures = 2;
    //     $totalDossiers =17;
    //     return view('admin.index', compact('validCandidatures', 'pendingCandidatures', 'rejectedCandidatures','totalDossiers'));
    // }
    
    public function index()
    {
        // Comptage des dossiers par tatut_dossier
        $validCandidatures = DossierElectoral::where('statut_dossier', 'like', 'validé')->count();
        $pendingCandidatures = DossierElectoral::where('statut_dossier', 'like','en attente')->count();
        $rejectedCandidatures = DossierElectoral::where('statut_dossier', 'like', 'rejeté')->count();
        $totalDossiers = DossierElectoral::count();

        // Retour des données à la vue
        return view('admin.index', compact(
            'validCandidatures',
            'pendingCandidatures',
            'rejectedCandidatures',
            'totalDossiers'
        ));
   return view('admin.index', compact('validCandidatures', 'pendingCandidatures', 'rejectedCandidatures','totalDossiers'));

    }
}
