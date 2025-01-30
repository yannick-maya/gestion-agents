<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreprisesTable extends Migration
{
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id(); // Identifiant unique
            $table->string('nom');
            $table->foreignId('section_id')->constrained()->cascadeOnDelete(); // Relation avec `sections`
            $table->foreignId('secteur_id')->constrained()->cascadeOnDelete(); // Relation avec `secteurs`
            $table->foreignId('lieu_inscription_id')->constrained()->cascadeOnDelete(); // Relation avec `lieux_inscription`
            $table->string('contact_telephone', 20)->nullable();
            $table->string('email')->nullable();
            $table->date('date_debut_activite')->nullable();
            $table->string('rccm')->nullable();
            $table->boolean('patente')->default(false);
            $table->boolean('quitus_fiscal')->default(false);    // Quitus fiscal
            $table->boolean('adhesion_cciama')->default(false);
            $table->string('nif')->nullable();
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('entreprises');
    }
}
