<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use App\Models\DossierElectoral;
use App\Models\Entreprise;
use App\Models\Responsable;
use App\Models\LieuInscription;
use App\Models\Section;
use App\Models\Secteur;
use Illuminate\Http\Request;

class DossierElectoralController extends Controller
{

    public function index(Request $request)
{
    // Récupérer les filtres soumis par l'utilisateur
    $secteur_id = $request->input('secteur_id');
    $section_id = $request->input('section_id');
    $statut_dossier = $request->input('statut_dossier');

    // Appliquer les filtres
    $dossiers_electoraux = DossierElectoral::query()
        ->when($secteur_id, function ($query, $secteur_id) {
            $query->where('secteur_id', $secteur_id);
        })
        ->when($section_id, function ($query, $section_id) {
            $query->where('section_id', $section_id);
        })
        ->when($statut_dossier, function ($query, $statut_dossier) {
            $query->where('statut_dossier', $statut_dossier);
        })
        ->with(['entreprise', 'responsable', 'secteur', 'section'])
        ->get();
    ; // Ajout de pagination si nécessaire

    // Récupérer les données nécessaires pour les filtres
    $secteurs = Secteur::all();
    $sections = Section::all();

    return view('dossiers_electoraux.index', compact('dossiers_electoraux', 'secteurs', 'sections'));
}

    /**
     * Afficher la liste des dossiers_electoraux électoraux.
     */
    // public function index(Request $request)
    // {       
    //     $dossiers_electoraux = DossierElectoral::with(['entreprise', 'responsable', 'section', 'secteur'])->paginate(10);

    //     $search = $request->query('search', ''); // Récupération du terme "search"

    //     // // Appliquer un filtre si un terme est saisi
  

    //     // $dossiers = DossierElectoral::when($search, function ($query, $search) {
    //     //     $columns = Schema::getColumnListing('dossiers_electoraux'); // Récupère toutes les colonnes de la table
    //     //     return $query->where(function ($query) use ($columns, $search) {
    //     //         foreach ($columns as $column) {
    //     //             $query->orWhere($column, 'like', "%{$search}%");
    //     //         }
    //     //     });
    //     // })->get();
        
    //     //  return view('dossiers_electoraux.index', compact('dossiers_electoraux', 'search'));
      


    //     return view('dossiers_electoraux.index', compact('dossiers_electoraux','search'));
    // }



    /**
     * Afficher le formulaire pour créer un nouveau dossier électoral.
     */
    public function create()
    {
        $entreprises = Entreprise::all();
        $responsables = Responsable::all();
        $sections = Section::all();
        $secteurs = Secteur::all();
        $lieux_inscription = LieuInscription::all();

        return view('dossiers_electoraux.create', compact('entreprises', 'responsables', 'sections', 'secteurs','lieux_inscription'));
     }

    /**
     * Sauvegarder un nouveau dossier électoral.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'entreprise_id' => 'required|exists:entreprises,id',
            'responsable_id' => 'required|exists:responsables,id',
            'section_id' => 'required|exists:sections,id',
            'secteur_id' => 'required|exists:secteurs,id',
            'date_depot' => 'required|date',
            'statut_dossier' => 'required|in:validé,rejeté,en attente',
            'est_candidat' => 'boolean',
            'est_elu' => 'boolean',
            'acte_candidature' => 'boolean',
            'recu_droit_candidature' => 'boolean',
            'attestation_inscription' => 'boolean',
            'quitus_fiscal' => 'boolean',
            'attestation_non_faillite' => 'boolean',
            'commentaires' => 'nullable|string',
        ]);$entreprise = Entreprise::findOrFail($request->entreprise_id);

        // Vérification des critères
        $isValid = true;
        if (!$entreprise->rccm) {
            $isValid = false;
        }
        if (!$entreprise->patente_validée) {
            $isValid = false;
        }
        if ($entreprise->adhesion_cciam != "Oui") {
            $isValid = false;
        }
        if ($entreprise->casier_judiciaire != "Oui") {
            $isValid = false;
        }
        if ($entreprise->age_legal != "Oui") {
            $isValid = false;
        }
     
    
        // Déterminer le statut en fonction des critères
        $statut_dossier = $isValid ? 'validé' : 'rejeté';
    
        // Ajouter le statut au validatedData
        $validatedData['statut_dossier'] = $statut_dossier;
    
        // Créer le dossier électoral
        DossierElectoral::create($validatedData);
    
        return redirect()->route('dossiers_electoraux.index')->with('success', 'Dossier électoral créé avec succès.');
    }
    /**
     * Afficher le formulaire d'édition d'un dossier électoral.
     */
    public function edit($id)
    {
        $dossier = DossierElectoral::findOrFail($id);
        $entreprises = Entreprise::all();
        $responsables = Responsable::all();
        $sections = Section::all();
        $secteurs = Secteur::all();
        $lieux_inscription = LieuInscription::all();

        return view('dossiers_electoraux.edit', compact('dossier', 'entreprises', 'responsables', 'sections', 'secteurs', 'lieux_inscription'));
    }

    /**
     * Mettre à jour un dossier électoral existant.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'entreprise_id' => 'required|exists:entreprises,id',
            'responsable_id' => 'required|exists:responsables,id',
            'section_id' => 'required|exists:sections,id',
            'secteur_id' => 'required|exists:secteurs,id',
            'date_depot' => 'required|date',
            'statut_dossier' => 'required|in:validé,rejeté,en attente',
            'est_candidat' => 'boolean',
            'est_elu' => 'boolean',
            'acte_candidature' => 'boolean',
            'recu_droit_candidature' => 'boolean',
            'attestation_inscription' => 'boolean',
            'quitus_fiscal' => 'boolean',
            'attestation_non_faillite' => 'boolean',
            'commentaires' => 'nullable|string',
        ]);
        $dossier = DossierElectoral::findOrFail($id);
        $entreprise = Entreprise::findOrFail($request->entreprise_id);
    
        // Vérification des critères supplémentaires
        $isValid = true;
        if (!$entreprise->rccm) {
            $isValid = false;
        }
        if (!$entreprise->patente_validée) {
            $isValid = false;
        }
        if ($entreprise->adhesion_cciam != "Oui") {
            $isValid = false;
        }
        if ($entreprise->casier_judiciaire != "Oui") {
            $isValid = false;
        }
        if ($entreprise->age_legal != "Oui") {
            
           
    $isValid = false;
        }
       
        // Déterminer le statut en fonction des critères
        $statut_dossier = $isValid ? 'validé' : 'rejeté';

        $dossier->update(['statut_dossier' => $statut_dossier]);
        return redirect()->route('dossiers_electoraux.index')->with('success', 'Dossier électoral mis à jour avec succès.');

    }    
/**
 * Afficher les détails d'un dossier électoral.
 */
public function show($id)
{
    // Récupérer le dossier électoral avec ses relations
    $dossier = DossierElectoral::with(['entreprise', 'responsable', 'section', 'secteur'])->findOrFail($id);

    return view('dossiers_electoraux.show', compact('dossier'));
}

    /**
     * Supprimer un dossier électoral.
     */
    public function destroy($id)
    {
        $dossier = DossierElectoral::findOrFail($id);
        $dossier->delete();

        return redirect()->route('dossiers_electoraux.index')->with('success', 'Dossier électoral supprimé avec succès.');
    }

    public function search(Request $request)
    {
        // Assurez-vous qu'une clé de recherche est fournie
        $keyword = $request->input('keyword');
    
        if (!$keyword) {
            return redirect()->route('dossiers_electoraux.index')->withErrors('Veuillez fournir un mot-clé pour la recherche.');
        }
    
        // Rechercher un dossier par mot-clé dans plusieurs colonnes
        $dossiers = DossierElectoral::where('id', $keyword)
            ->orWhereHas('entreprise', function ($query) use ($keyword) {
                $query->where('nom', 'like', '%' . $keyword . '%');
            })
            ->orWhereHas('responsable', function ($query) use ($keyword) {
                $query->where('nom', 'like', '%' . $keyword . '%');
            })
            ->orWhereHas('secteur', function ($query) use ($keyword) {
                $query->where('nom', 'like', '%' . $keyword . '%');
            })
            ->orWhereHas('section', function ($query) use ($keyword) {
                $query->where('nom', 'like', '%' . $keyword . '%');
            })
            ->orWhere('statut_dossier', 'like', '%' . $keyword . '%')
            ->get();
    
        // Si aucun résultat n'est trouvé
        if ($dossiers->isEmpty()) {
            return redirect()->route('dossiers_electoraux.search')->with('status', 'Aucun dossier trouvé correspondant à votre recherche.');
        }
    
        // Renvoyer les résultats à une vue
        return view('dossiers_electoraux.search', [
            'dossiers' => $dossiers,
        ]);
    }
    

    
//     public function search(Request $request)
// {
//     $searchTerm = $request->input('search');

//     $dossiers = DossierElectoral::when($searchTerm, function ($query, $searchTerm) {
//         $query->where('nom', 'like', "%{$searchTerm}%")
//               ->orWhere('description', 'like', "%{$searchTerm}%");
//     })->get();

//     $entreprises = Entreprise::when($searchTerm, function ($query, $searchTerm) {
//         $query->where('nom', 'like', "%{$searchTerm}%")
//               ->orWhere('adresse', 'like', "%{$searchTerm}%");
//     })->get();

//     $responsables = Responsable::when($searchTerm, function ($query, $searchTerm) {
//         $query->where('nom', 'like', "%{$searchTerm}%")
//               ->orWhere('poste', 'like', "%{$searchTerm}%");
//     })->get();

//     return view('resultats.index', compact('dossiers', 'entreprises', 'responsables', 'searchTerm'));
// }

// public function verifierCandidat($dossier)
// {
//     $remarques = [];

//     // Vérification des critères
//     if ($dossier->age < 18) {
//         $remarques[] = "L'âge du candidat est inférieur à 18 ans.";
//     }
//     if (!$dossier->rccm) {
//         $remarques[] = "RCCM non fourni.";
//     }
//     if (!$dossier->patente) {
//         $remarques[] = "Patente de l'année en cours manquante.";
//     }
//     if (!$dossier->adhesion_cciama) {
//         $remarques[] = "Adhésion à la CCIAMA non valide.";
//     }
//     if (!$dossier->quitus_fiscal) {
//         $remarques[] = "Quitus fiscal manquant.";
//     }
//     if (!$dossier->attestation_non_faillite) {
//         $remarques[] = "Attestation de non faillite manquante.";
//     }
//     if (!$dossier->attestation_inscription) {
//         $remarques[] = "Attestation d'inscription sur la liste électorale manquante.";
//     }
//     if (!$dossier->acte_candidature) {
//         $remarques[] = "Acte de candidature manquant.";
//     }
//     if (!$dossier->recu_droit_candidature) {
//         $remarques[] = "Reçu de versement de droit de candidature non fourni.";
//     }

//     // Mise à jour du statut
//     if (count($remarques) == 0) {
//         $dossier->statut_dossier = 'Candidat valide';
//     } else {
//         $dossier->statut_dossier = 'Candidat invalide';
//         $dossier->commentaires = implode(', ', $remarques);
//     }

//     $dossier->save();
// }


}
