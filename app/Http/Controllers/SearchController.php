<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function globalSearch(Request $request)
    {
        $searchTerm = $request->query('search', '');

        // Partager le terme global (facultatif si déjà partagé dans AppServiceProvider)
        view()->share('globalSearch', $searchTerm);

        // Rediriger vers une page spécifique avec le terme de recherche
        return redirect()->route('dossiers_electoraux.index', ['search' => $searchTerm]);
    }
}

