<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Event;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Rendezvény seeder-ek

        Event::truncate();

        $event_1 = Event::create([
            'id' => 1,
            'name' => 'Koncert',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'date' => '2020-09-01',
            'ticket_price' => '2100',
            'location_id' => 1,
        ]);
        $event_2 = Event::create([
            'id' => 2,
            'name' => 'Színházi előadás I.',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'date' => '2020-09-04',
            'ticket_price' => '2000',
            'location_id' => 1,
        ]);
        $event_3 = Event::create([
            'id' => 3,
            'name' => 'Borkostoló',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'date' => '2020-09-06',
            'ticket_price' => '1500',
            'location_id' => 2,
        ]);
        $event_4 = Event::create([
            'id' => 4,
            'name' => 'Villám csődület',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'date' => '2020-10-02',
            'ticket_price' => '0',
            'location_id' => 2,
        ]);
        $event_5 = Event::create([
            'id' => 5,
            'name' => 'Színházi előadás II.',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'date' => '2020-09-05',
            'ticket_price' => '2200',
            'location_id' => 1,
        ]);

        // Rendezvény - Előadó relációk random feltöltése

        DB::table('event_performer')->truncate();

        $performers = App\Performer::all();

        Event::all()->each(function ($event) use ($performers) {
            $event->performers()->attach(
                $performers->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        // Teszt user-ek néhány eseményre már vettek jegyet

        DB::table('event_user')->truncate();

        $john = User::where('id', '1')->first();
        $jane = User::where('id', '2')->first();

        $event_1->users()->attach($john);
        $event_1->users()->attach($jane);
        $event_2->users()->attach($john);
        $event_3->users()->attach($jane);

    }
}
