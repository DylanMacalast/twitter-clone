<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * relationship with the user
     *
     * @return User 
     */
    public function user()
    {
        // tweet belongs to a user
        return $this->belongsTo(User::class);
    }
}
