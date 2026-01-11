<?php

namespace App\Http\Controllers;

use App\Models\Gado;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLeite = Gado::where('abatido', false)->sum('leite');
        $totalRacao = Gado::where('abatido', false)->sum('racao');

        $animaisJovens = Gado::where('abatido', false)
            ->whereDate('nascimento', '>=', now()->subYear())
            ->where('racao', '>', 500)
            ->count();

        return view('dashboard', compact(
            'totalLeite',
            'totalRacao',
            'animaisJovens'
        ));
    }
}
