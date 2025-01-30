<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;

    // Nom de la table
    protected $table = 'responsables';

    // Attributs mass assignables
    protected $fillable = [
        'entreprise_id',
        'nom',
        'prenom',
        'genre',
        'titre',
        'contact',
        'email',
        'age',
        'piece_identite',
    ];

    // Relation avec l'entité 'Entreprise'
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    // Règles de validation
    public static function rules()
{
    return [
        'entreprise_id' => 'required|exists:entreprises,id',
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'genre' => 'nullable|in:M,F',
        'titre' => 'nullable|string|max:255',
        'contact' => 'required|string|max:20|unique:responsables,contact', // Obligatoire et unique dans la table responsables
        'email' => 'required|email|max:255|unique:responsables,email', // Obligatoire et unique dans la table responsables
        'age' => 'required|integer|min:18',
        'piece_identite' => 'required|string|max:255|unique:responsables,piece_identite', // Obligatoire et unique dans la table responsables
    ];
}

}
