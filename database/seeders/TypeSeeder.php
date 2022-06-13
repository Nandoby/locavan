<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Seed the application's database
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'Caravane',
            ],
            [
                'name' => 'Van'
            ],
            [
                'name' => 'Fourgon aménagé',
            ],
            [
                'name' => 'Intégral'
            ]
        ];

        foreach($types as $type) {
            Type::create($type);
        }
    }
}
