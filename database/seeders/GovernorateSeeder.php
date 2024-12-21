<?php

namespace Database\Seeders;
use App\Models\Governorate;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $governorates = [
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

        foreach ($governorates as $governorate) {
            Governorate::create(['governorate_name' => $governorate]);
        }
    }
}
