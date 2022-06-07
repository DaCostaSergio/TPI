<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    /**
     * Relation to User table
     * @return void
     */
    public function users()
    {
        $this->HasMany('users');
    }
}
