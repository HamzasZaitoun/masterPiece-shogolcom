<?php

namespace Database\Seeders;
use App\Models\Governate;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GovernateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $governates = [
            'Amman',
            'Irbid',
            'Zarqaa',
            'Madaba',
            'Karak',
            'Ma\'an',
            'Tafila',
            'Ajloun',
            'Jerash',
            'Balqa',
            'Mafraq',
        ];

        foreach ($governates as $governate) {
            Governate::create(['governate_name' => $governate]);
        }
    }
}
