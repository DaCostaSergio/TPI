<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i < 52; ++$i){
            DB::table('cards')->insert([
                'carName' => Str::random(5),
                'carValue' => rand(2, 11),
            ]);
        }

    }


}
