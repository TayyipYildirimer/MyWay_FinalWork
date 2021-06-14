<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            [
                'colorId' => '1',
                'color1' => 'f7f3e9',
                'color2' => 'a3d2ca',
                'color3' => '5eaaa8',
                'color4' => 'f05945'
            ],[
                'colorId' => '2',
                'color1' => 'fffbdf',
                'color2' => 'c6ffc1',
                'color3' => '34656d',
                'color4' => '334443'
            ],[
                'colorId' => '3',
                'color1' => 'f7f3e9',
                'color2' => 'a3d2ca',
                'color3' => '5eaaa8',
                'color4' => 'f05945'
            ],[
                'colorId' => '4',
                'color1' => '5f939a',
                'color2' => 'd8ac9c',
                'color3' => 'eac8af',
                'color4' => '1b2021'
            ]
        ]);
    }
}
