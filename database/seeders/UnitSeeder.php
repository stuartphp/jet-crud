<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductUnit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductUnit::insert([
            [
                'name'=>'Each',
            ],
            [
                'name'=>'Box(100)',
            ],
            [
                'name'=>'1oz',
            ],
            [
                'name'=>'1/2oz',
            ],
            [
                'name'=>'8oz',
            ],
            [
                'name'=>'12oz',
            ],
            [
                'name'=>'Box(50)',
            ],
            [
                'name'=>'Pkt',
            ],

        ]);
    }
}
