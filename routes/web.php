<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    Route::resource('entreprises', EntrepriseController::class);

});
use App\Http\Controllers\SecteurController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\DossierElectoralController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\LieuInscriptionController;

// Routes pour les Secteurs
Route::resource('secteurs', SecteurController::class);

// Routes pour les Entreprises
Route::resource('entreprises', EntrepriseController::class);

// Routes pour les Dossiers électoraux
Route::resource('dossiers_electoraux', DossierElectoralController::class);

// Routes pour les Responsables
Route::resource('responsables', ResponsableController::class);

// Routes pour les Sections
Route::resource('sections', SectionController::class);

// Routes pour les Lieux d'Inscription
Route::resource('lieux_inscription', LieuInscriptionController::class);

use App\Http\Controllers\AdminController;

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('dossiers_electoraux/{id}/edit', [DossierElectoralController::class, 'edit'])->name('dossiers_electoraux.edit');
  

//menu recherche
use App\Http\Controllers\RechercheController;

use App\Http\Controllers\SearchController;

Route::get('/search', [DossierElectoralController::class, 'search'])->name('dossiers_electoraux.search');




// Routes pour les candidatures
use App\Http\Controllers\CandidatureController;

Route::prefix('candidatures')->group(function () {
    Route::get('/validees', [CandidatureController::class, 'validees'])->name('candidatures.validees');
    Route::get('/en-attente', [CandidatureController::class, 'enAttente'])->name('candidatures.en_attente');
    Route::get('/rejetees', [CandidatureController::class, 'rejetees'])->name('candidatures.rejetees');
});
