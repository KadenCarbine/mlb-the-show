<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quirk extends Model
{
    /** @use HasFactory<\Database\Factories\QuirkFactory> */
    use HasFactory;

    protected $fillable = ['mlb_card_id', 'name', 'description', 'img'];

    public function mlbCard()
    {
        return $this->belongsTo(MLBCard::class, 'mlb_card_id');
    }
}

