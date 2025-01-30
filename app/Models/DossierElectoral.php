<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierElectoral extends Model
{
    use HasFactory;

    // Nom de la table
    protected $table = 'dossiers_electoraux';

    // Champs autorisés pour insertion/mise à jour
    protected $fillable = [
        'entreprise_id',
        'responsable_id',
        'section_id',
        'secteur_id',
        'date_depot',
        'statut_dossier',
        'est_candidat',
        'est_elu',
        'acte_candidature',
        'recu_droit_candidature',
        'attestation_inscription',
        'quitus_fiscal',
        'attestation_non_faillite',
        'commentaires',
    ];

    /**
     * Relations avec d'autres modèles.
     */

    // Relation avec l'entreprise
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    // Relation avec le responsable
    public function responsable()
    {
        return $this->belongsTo(Responsable::class);
    }

    // Relation avec la section
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    // Relation avec le secteur
    public function secteur()
    {
        return $this->belongsTo(Secteur::class);
    }

    /**
     * Accesseurs et mutateurs (si besoin).
     */

    // Exemple : Obtenir un statut formaté
    public function getStatutDossierLabelAttribute()
    {
        $labels = [
            'validé' => 'Validé',
            'rejeté' => 'Rejeté',
            'en attente' => 'En Attente',
        ];

        return $labels[$this->statut_dossier] ?? 'Inconnu';
    }
}
