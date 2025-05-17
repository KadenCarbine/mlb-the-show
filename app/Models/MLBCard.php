<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MLBCard extends Model
{
    use HasFactory;

    protected $table = 'mlb_cards';

    protected $fillable = [
        'uuid', 'type', 'img', 'baked_img', 'sc_baked_img',
        'name', 'short_description', 'rarity', 'team', 'team_short_name',
        'ovr', 'series', 'series_texture_name', 'series_year',
        'display_position', 'display_secondary_positions', 'jersey_number',
        'age', 'bat_hand', 'throw_hand', 'weight', 'height', 'born',
        'is_hitter', 'stamina', 'pitching_clutch', 'hits_per_bf', 'k_per_bf', 'bb_per_bf',
        'hr_per_bf', 'pitch_velocity', 'pitch_control', 'pitch_movement',
        'contact_left', 'contact_right', 'power_left', 'power_right',
        'plate_vision', 'plate_discipline', 'batting_clutch',
        'bunting_ability', 'drag_bunting_ability', 'hitting_durability',
        'fielding_durability', 'fielding_ability', 'arm_strength', 'arm_accuracy',
        'reaction_time', 'blocking', 'speed', 'baserunning_ability', 'baserunning_aggression',
        'hit_rank_image', 'fielding_rank_image', 'is_sellable', 'has_augment',
        'augment_text', 'augment_end_date', 'has_matchup', 'stars', 'trend',
        'new_rank', 'has_rank_change', 'event', 'set_name', 'is_live_set', 'ui_anim_index'
    ];

    public function quirks(): HasMany
    {
        return $this->hasMany(Quirk::class, 'mlb_card_id');
    }

    public function locations(): BelongsToMany
    {
        return $this->belongsToMany(Location::class, 'location_mlb_card', 'mlb_card_id');
    }
}
