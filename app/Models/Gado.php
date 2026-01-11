<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gado extends Model
{
    protected $fillable = [
        'codigo',
        'leite',
        'racao',
        'peso',
        'nascimento',
        'abatido',
        'fazenda_id',
    ];

    protected $casts = [
        'nascimento' => 'date',
        'abatido' => 'boolean',
    ];

    // Cada gado pertence a uma fazenda
    public function fazenda()
    {
        return $this->belongsTo(Fazenda::class);
    }

    // 🔥 REGRA DE NEGÓCIO: pode ir para abate?
    public function podeIrParaAbate(): bool
    {
        $idade = $this->nascimento->diffInYears(now());
        $racaoDia = $this->racao / 7;

        return
            $idade > 5 ||
            $this->leite < 40 ||
            ($this->leite < 70 && $racaoDia > 50) ||
            $this->peso > 270;
    }
}
