<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MLBCard>
 */
class MLBCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid,
            'type' => 'mlb_card',
            'img' => $this->faker->imageUrl(),
            'baked_img' => $this->faker->imageUrl(),
            'sc_baked_img' => null,
            'name' => $this->faker->name(),
            'short_description' => $this->faker->optional()->sentence(),
            'rarity' => $this->faker->randomElement(['Diamond', 'Gold', 'Silver']),
            'team' => $this->faker->company(),
            'team_short_name' => strtoupper($this->faker->lexify('??')),
            'ovr' => $this->faker->numberBetween(60, 99),
            'series' => $this->faker->randomElement(['Live', 'Legends', 'Flashback']),
            'series_texture_name' => '',
            'series_year' => $this->faker->year(),
            'display_position' => $this->faker->randomElement(['RF', '1B', 'SP', 'C']),
            'display_secondary_positions' => '',
            'jersey_number' => $this->faker->numberBetween(1, 99),
            'age' => $this->faker->numberBetween(18, 40),
            'bat_hand' => $this->faker->randomElement(['R', 'L', 'S']),
            'throw_hand' => $this->faker->randomElement(['R', 'L']),
            'weight' => $this->faker->numberBetween(160, 250) . ' lbs',
            'height' => $this->faker->randomElement(['5\'11"', '6\'0"', '6\'3"', '6\'5"']),
            'born' => $this->faker->country(),
            'is_hitter' => $this->faker->boolean(),
            'stamina' => 0,
            'pitching_clutch' => 0,
            'hits_per_bf' => 0,
            'k_per_bf' => 0,
            'bb_per_bf' => 0,
            'hr_per_bf' => 0,
            'pitch_velocity' => 0,
            'pitch_control' => 10,
            'pitch_movement' => 10,
            'contact_left' => $this->faker->numberBetween(50, 100),
            'contact_right' => $this->faker->numberBetween(50, 100),
            'power_left' => $this->faker->numberBetween(50, 100),
            'power_right' => $this->faker->numberBetween(50, 100),
            'plate_vision' => $this->faker->numberBetween(50, 100),
            'plate_discipline' => $this->faker->numberBetween(50, 100),
            'batting_clutch' => $this->faker->numberBetween(50, 100),
            'bunting_ability' => $this->faker->numberBetween(0, 60),
            'drag_bunting_ability' => $this->faker->numberBetween(0, 60),
            'hitting_durability' => $this->faker->numberBetween(50, 100),
            'fielding_durability' => 0,
            'fielding_ability' => $this->faker->numberBetween(50, 100),
            'arm_strength' => $this->faker->numberBetween(50, 100),
            'arm_accuracy' => $this->faker->numberBetween(50, 100),
            'reaction_time' => $this->faker->numberBetween(50, 100),
            'blocking' => 0,
            'speed' => $this->faker->numberBetween(40, 100),
            'baserunning_ability' => $this->faker->numberBetween(40, 100),
            'baserunning_aggression' => $this->faker->numberBetween(40, 100),
            'hit_rank_image' => $this->faker->imageUrl(),
            'fielding_rank_image' => $this->faker->imageUrl(),
            'is_sellable' => $this->faker->boolean(),
            'has_augment' => false,
            'augment_text' => null,
            'augment_end_date' => null,
            'has_matchup' => false,
            'stars' => null,
            'trend' => null,
            'new_rank' => $this->faker->numberBetween(60, 99),
            'has_rank_change' => false,
            'event' => false,
            'set_name' => $this->faker->word(),
            'is_live_set' => $this->faker->boolean(),
            'ui_anim_index' => $this->faker->numberBetween(0, 5),
        ];
    }
}

