<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Veterinario;
use App\Models\Gado;

class Fazenda extends Model
{
    protected $fillable = [
        'nome',
        'tamanho',
        'responsavel',
    ];

    // Uma fazenda pode ter vários veterinários (ManyToMany)
    public function veterinarios()
    {
        return $this->belongsToMany(Veterinario::class);
    }

    // Uma fazenda tem vários gados (OneToMany)
    public function gados()
    {
        return $this->hasMany(Gado::class);
    }
}
