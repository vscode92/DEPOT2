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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id('Id_utilisateur');

            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('mot_de_passe');
            $table->string('telephone_utilisateur');

            $table->unsignedBigInteger('Id_role');
            $table->unsignedBigInteger('Id_service');

            $table->foreign('Id_role')
                ->references('Id_role')
                ->on('roles');

            $table->foreign('Id_service')
                ->references('Id_service')
                ->on('services');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
