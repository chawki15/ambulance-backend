<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [

            [
                'name' => 'Perfusion et Injection'
            ],

            [
                'name' => 'Voies aériennes et Respiratoires'
            ],

            [
                'name' => 'Pansements et Soins'
            ],

            [
                'name' => 'Diagnostic et Surveillance'
            ],

            [
                'name' => 'Protection et Hygiène'
            ],

            [
                'name' => 'Déchets Médicaux'
            ],

            [
                'name' => 'Désinfection et Antisepsie'
            ],

            [
                'name' => 'Urgences et Divers'
            ],

        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
