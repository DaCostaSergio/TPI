<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CardUser extends Pivot
{
    use HasFactory;

    public $timestamps = false;

    public function cards()
    {
        return $this->HasMany(Card::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getValueAttribute()
    {
        return $this->card->carValue;
    }

    public function getPlayerCards()
    {
        $cards = collect(this->cards);
            return $cards;
    }
}
