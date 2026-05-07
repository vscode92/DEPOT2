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
        Schema::create('affectations', function (Blueprint $table) {
            $table->id('Id_affectation');
            $table->dateTime('Date_affectation');
            $table->string('Statut');

            // Déclaration des clés étrangères
            $table->unsignedBigInteger('Id_courrier');
            $table->unsignedBigInteger('Id_service');
            $table->unsignedBigInteger('Id_utilisateur');

            // Définition des clés étrangères
            $table->foreign('Id_courrier')->references('Id_courrier')->on('courriers');
            $table->foreign('Id_service')->references('Id_service')->on('services');
            $table->foreign('Id_utilisateur')->references('Id_utilisateur')->on('utilisateurs');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectations');
    }
};
