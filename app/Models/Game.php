<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
