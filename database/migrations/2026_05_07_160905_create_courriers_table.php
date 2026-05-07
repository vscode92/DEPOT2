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
        Schema::create('courriers', function (Blueprint $table) {
            $table->id('Id_courrier');
            $table->string('Numero_courrier')->unique();
            $table->string('Objet');
            $table->string('Type');
            $table->date('Date_creation');
            $table->string('Statut');

            // Déclaration des clés étrangères
            $table->unsignedBigInteger('Id_expediteur');
            $table->unsignedBigInteger('Id_destinataire');

            // Définition des clés étrangères
            $table->foreign('Id_expediteur')->references('Id_expediteur')->on('expediteurs');
            $table->foreign('Id_destinataire')->references('Id_destinataire')->on('destinataires');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courriers');
    }
};
