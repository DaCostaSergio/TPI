<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardGame extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Relation to Card
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    /**
     * Relation to game
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * Function get card value
     * @return mixed
     */
    public function getValueAttribute()
    {
        return $this->card->carValue;
    }
}
