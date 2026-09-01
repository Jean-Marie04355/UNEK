<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->string('code_dossier')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->enum('genre', ['M', 'F'])->default('M');
            $table->date('date_naissance')->nullable();
            $table->string('nationalite')->default('Tchadienne');
            $table->string('telephone');
            $table->string('email');
            $table->string('adresse')->nullable();
            
            $table->string('cycle')->default('Licence 1');
            $table->string('faculte');
            $table->string('filiere');
            
            $table->enum('statut', ['en_attente', 'admis', 'incomplet', 'refuse'])->default('en_attente');
            
            $table->string('bac_path')->nullable();
            $table->string('cni_path')->nullable();
            $table->string('photo_path')->nullable();
            
            $table->text('remarques_admin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};
