<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 
        'section_id', 
        'secteur_id', 
        'lieu_inscription_id', 
        'contact_telephone', 
        'email', 
        'date_debut_activite', 
        'rccm', 
        'patente', 
        'adhesion_cciama', 
        'casier_judiciaire', 
        'nif'
    ];

    // Définition des relations
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function secteur()
    {
        return $this->belongsTo(Secteur::class);
    }

    public function lieuInscription()
    {
        return $this->belongsTo(LieuInscription::class);
    }

    public function responsables()
    {
        return $this->hasMany(Responsable::class);
    }
}
