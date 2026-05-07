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
        Schema::create('pieces_jointes', function (Blueprint $table) {
            $table->id('Id_fichier');
            $table->string('Nom_fichier');
            $table->string('Type_fichier');
            $table->string('chemin');
            $table->integer('taille');

            // Déclaration de la clé étrangère
            $table->unsignedBigInteger('Id_courrier');

            // Définition de la clé étrangère
            $table->foreign('Id_courrier')->references('Id_courrier')->on('courriers');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pieces_jointes');
    }
};
