<?php

namespace Database\Seeders;

use App\Models\Quirk;
use App\Models\MLBCard;
use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MLBCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::insert([
            ['name' => 'COMMUNITY MARKET'],
            ['name' => 'DAILY LOGIN REWARD'],
            ['name' => 'THE SHOW PACK'],
        ]);

        MLBCard::factory()
            ->count(10)
            ->create()
            ->each(function ($card) {
                // Attach 3 random quirks
                $quirks = Quirk::factory()->count(3)->make();
                $card->quirks()->saveMany($quirks);

                // Attach random locations
                $locationIds = Location::inRandomOrder()->limit(2)->pluck('id');
                $card->locations()->attach($locationIds);
            });
    }
}
