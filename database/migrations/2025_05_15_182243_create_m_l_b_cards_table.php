<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mlb_cards', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('type');
            $table->string('img');
            $table->string('baked_img');
            $table->string('sc_baked_img')->nullable();
            $table->string('name');
            $table->text('short_description')->nullable();
            $table->string('rarity');
            $table->string('team');
            $table->string('team_short_name');
            $table->integer('ovr');
            $table->string('series');
            $table->string('series_texture_name')->nullable();
            $table->integer('series_year');
            $table->string('display_position');
            $table->string('display_secondary_positions')->nullable();
            $table->string('jersey_number');
            $table->integer('age');
            $table->string('bat_hand');
            $table->string('throw_hand');
            $table->string('weight');
            $table->string('height');
            $table->string('born');
            $table->boolean('is_hitter')->default(true);
            $table->unsignedTinyInteger('stamina');
            $table->unsignedTinyInteger('pitching_clutch');
            $table->unsignedTinyInteger('hits_per_bf');
            $table->unsignedTinyInteger('k_per_bf');
            $table->unsignedTinyInteger('bb_per_bf');
            $table->unsignedTinyInteger('hr_per_bf');
            $table->unsignedTinyInteger('pitch_velocity');
            $table->unsignedTinyInteger('pitch_control');
            $table->unsignedTinyInteger('pitch_movement');
            $table->unsignedTinyInteger('contact_left');
            $table->unsignedTinyInteger('contact_right');
            $table->unsignedTinyInteger('power_left');
            $table->unsignedTinyInteger('power_right');
            $table->unsignedTinyInteger('plate_vision');
            $table->unsignedTinyInteger('plate_discipline');
            $table->unsignedTinyInteger('batting_clutch');
            $table->unsignedTinyInteger('bunting_ability');
            $table->unsignedTinyInteger('drag_bunting_ability');
            $table->unsignedTinyInteger('hitting_durability');
            $table->unsignedTinyInteger('fielding_durability');
            $table->unsignedTinyInteger('fielding_ability');
            $table->unsignedTinyInteger('arm_strength');
            $table->unsignedTinyInteger('arm_accuracy');
            $table->unsignedTinyInteger('reaction_time');
            $table->unsignedTinyInteger('blocking');
            $table->unsignedTinyInteger('speed');
            $table->unsignedTinyInteger('baserunning_ability');
            $table->unsignedTinyInteger('baserunning_aggression');
            $table->string('hit_rank_image');
            $table->string('fielding_rank_image');
            $table->boolean('is_sellable')->default(false);
            $table->boolean('has_augment')->default(false);
            $table->text('augment_text')->nullable();
            $table->timestamp('augment_end_date')->nullable();
            $table->boolean('has_matchup')->default(false);
            $table->integer('stars')->nullable();
            $table->integer('trend')->nullable();
            $table->integer('new_rank');
            $table->boolean('has_rank_change')->default(false);
            $table->boolean('event')->default(false);
            $table->string('set_name');
            $table->boolean('is_live_set')->default(false);
            $table->unsignedTinyInteger('ui_anim_index');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mlb_cards');
    }
};
