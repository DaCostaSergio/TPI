<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CardUser extends Pivot
{
    use HasFactory;


    public $timestamps = false;

    /**
     * Relation to card
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cards()
    {
        return $this->HasMany(Card::class);
    }

    /**
     * Relation to user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Function Card Value
     * @return mixed
     */
    public function getValueAttribute()
    {
        return $this->card->carValue;
    }

    /**
     * Collect player Cards
     * Collect player Cards
     * @return \Illuminate\Support\Collection
     */
    public function getPlayerCards()
    {
        $cards = collect(this->cards);
        return $cards;
    }
}
