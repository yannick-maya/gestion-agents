<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsablesTable extends Migration
{
    public function up()
    {
        Schema::create('responsables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entreprise_id')->constrained()->cascadeOnDelete(); // Relation avec `entreprises`
            $table->string('nom');
            $table->string('prenom');
            $table->enum('genre', ['M', 'F'])->nullable();
            $table->string('titre')->nullable();
            $table->string('contact', 20)->nullable();
            $table->string('email')->nullable();
            $table->integer('age')->nullable();
            $table->boolean('inscription_electoral')->default(false);
            $table->string('piece_identite')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('responsables');
    }
}
