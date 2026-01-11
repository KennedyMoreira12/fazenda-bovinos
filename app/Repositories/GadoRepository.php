<?php

namespace App\Repositories;

use App\Models\Gado;

class GadoRepository
{
    /**
     * Total de leite produzido na semana (gados não abatidos)
     */
    public function totalLeiteSemana()
    {
        return Gado::where('abatido', false)->sum('leite');
    }

    /**
     * Retorna gados aptos para abate
     */
    public function gadosParaAbate()
    {
        return Gado::where('abatido', false)
            ->get()
            ->filter(fn ($gado) => $gado->podeIrParaAbate());
    }
}
