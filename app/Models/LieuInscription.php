<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LieuInscription extends Model
{
    use HasFactory;
    //Spécifiez le nom exact de la table dans la base de données
    protected $table = 'lieux_inscription';


    protected $fillable = ['nom'];

    public function entreprises()
    {
        return $this->hasMany(Entreprise::class);
    }
}
