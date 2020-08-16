<?php

use Illuminate\Database\Seeder;
use App\Location;
use Illuminate\Support\Facades\Hash;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::truncate();

        Location::create([
            'id' => 1,
            'name' => 'Royal Alfred Mall',
            'address' => 'London, Main street 1',
            'capacity' => 3000,
        ]);

        Location::create([
            'id' => 2,
            'name' => 'Circus Maxumus',
            'address' => 'Róma, Cézár tér 15',
            'capacity' => 1500,
        ]);
    }
}
