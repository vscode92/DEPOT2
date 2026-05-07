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
        Schema::create('archives', function (Blueprint $table) {
            $table->id('Id_archive');
            $table->date('Date_archive');
            $table->string('Type_archive');

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
        Schema::dropIfExists('archives');
    }
};
