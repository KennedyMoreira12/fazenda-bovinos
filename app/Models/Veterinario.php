<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veterinario extends Model
{
    protected $fillable = [
        'nome',
        'crmv',
    ];

    // Um veterinário pode atender várias fazendas
    public function fazendas()
    {
        return $this->belongsToMany(Fazenda::class);
    }
}
