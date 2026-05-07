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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('Id_notification');
            $table->text('message');
            $table->dateTime('Date_envoi');
            $table->string('Statut');

            // Déclaration des clés étrangères
            $table->unsignedBigInteger('Id_courrier');
            $table->unsignedBigInteger('Id_utilisateur');

            // Définition des clés étrangères
            $table->foreign('Id_courrier')->references('Id_courrier')->on('courriers');
            $table->foreign('Id_utilisateur')->references('Id_utilisateur')->on('utilisateurs');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
