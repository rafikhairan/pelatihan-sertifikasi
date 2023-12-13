<?php

namespace App\Models;

use App\Models\Genre;
use App\Models\Platform;
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

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('name', 'like', '%' . $search . '%');
        });
    }
}
