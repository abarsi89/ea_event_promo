<?php

use Illuminate\Database\Seeder;
use App\Performer;
use Illuminate\Support\Facades\Hash;

class PerformerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Performer::truncate();

        Performer::create([
            'id' => 1,
            'name' => 'Rock And Roll Band',
            'type' => 'musician',
        ]);
        Performer::create([
            'id' => 2,
            'name' => 'John Cleese',
            'type' => 'comedian',
        ]);
        Performer::create([
            'id' => 3,
            'name' => 'Bruce Willis Theater Company',
            'type' => 'actor',
        ]);
    }
}
