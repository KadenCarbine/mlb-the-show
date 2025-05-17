<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /** @use HasFactory<\Database\Factories\LocationFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    public function mlbCards()
    {
        return $this->belongsToMany(MLBCard::class, 'location_mlb_card');
    }
}
