<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $fillable = ['number'];
    public $timestamps = false;
    protected $casts = ['watched' => 'boolean'];

    public function seasons()
    {
        return $this->belongsTo(Season::class);
    }

    /** 
    // Acessors e Mutators
    protected function watched(): Attribute
    {
        return Attribute::make(
            get: fn ($watched) => (bool) $watched,
            set: fn ($watched) => (bool) $watched,
        );
    }
    */
}
