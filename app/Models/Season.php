<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = ['number'];
    public function series()
    {
            return $this->belongsTo(Series::class);
    }
    public function episodes()
    {
            return $this->hasMany(Episode::class);
    }

    public function numberOfWatchedEpisodes(): int
    {
        return $this->episodes
        ->filter(fn ($episode) => $episode->watched)
        ->count();
    }
}