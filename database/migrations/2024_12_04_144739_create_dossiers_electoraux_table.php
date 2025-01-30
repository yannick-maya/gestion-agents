<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossiersElectorauxTable extends Migration
{
    public function up()
    {
        Schema::create('dossiers_electoraux', function (Blueprint $table) {
            $table->id();
    
            // Clés étrangères
            $table->foreignId('entreprise_id')->constrained()->onDelete('cascade');
            $table->foreignId('responsable_id')->constrained()->onDelete('cascade');
            $table->foreignId('section_id')->constrained()->onDelete('cascade');
            $table->foreignId('secteur_id')->constrained()->onDelete('cascade');
    
            // Données spécifiques au dossier
            $table->date('date_depot'); // Date de dépôt
            $table->enum('statut_dossier', ['validé', 'rejeté', 'en attente'])->default('en attente'); // Statut
            $table->boolean('est_candidat')->default(false); // Candidat ou non
            $table->boolean('est_elu')->default(false); // Élu ou non
    
            // Critères administratifs
            $table->boolean('acte_candidature')->default(false);
            $table->boolean('recu_droit_candidature')->default(false);
            $table->boolean('attestation_inscription')->default(false);
            $table->boolean('quitus_fiscal')->default(false);
            $table->boolean('attestation_non_faillite')->default(false);
    
            // Commentaires et audit
            $table->text('commentaires')->nullable(); // Observations
            $table->timestamps(); // Dates de création et de mise à jour
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('dossiers_electoraux');
    }
}


