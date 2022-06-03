<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CardGame extends Pivot
{
    use HasFactory;

    public $timestamps = false;

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function getValueAttribute()
    {
        return $this->card->carValue;
    }
}
