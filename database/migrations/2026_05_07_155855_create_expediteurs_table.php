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
        Schema::create('expediteurs', function (Blueprint $table) {
            $table->id('Id_expediteur');
            $table->string('nom');
            $table->string('adresse');
            $table->string('telephone_expediteur');
            $table->string('email');

            // Déclaration de la clé étrangère
            $table->unsignedBigInteger('Id_service');

            // Définition de la clé étrangère
            $table->foreign('Id_service')->references('Id_service')->on('services');

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expediteurs');
    }
};
