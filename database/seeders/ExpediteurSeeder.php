<?php

namespace Database\Seeders;

use App\Models\Expediteur;
use Illuminate\Database\Seeder;

class ExpediteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Expediteur::create([
            'nom' => 'John Doe',
            'adresse' => '123 Rue Exemple',
            'telephone_expediteur' => '123456789',
            'email' => 'john@example.com',
            'Id_service' => 1,
        ]);
    }
}
