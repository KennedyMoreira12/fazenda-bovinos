<?php

namespace App\Http\Controllers;

use App\Models\Fazenda;
use App\Models\Veterinario;
use Illuminate\Http\Request;

class FazendaController extends Controller
{
    // LISTAR FAZENDAS
    public function index()
    {
        $fazendas = Fazenda::with('veterinarios')->paginate(10);
        return view('fazendas.index', compact('fazendas'));
    }

    // TELA DE CADASTRO
    public function create()
    {
        $veterinarios = Veterinario::all();
        return view('fazendas.create', compact('veterinarios'));
    }

    // SALVAR FAZENDA
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome'        => 'required|string|unique:fazendas,nome',
            'tamanho'     => 'required|integer|min:1',
            'responsavel' => 'required|string',
            'veterinarios'=> 'array'
        ]);

        $fazenda = Fazenda::create([
            'nome'        => $validated['nome'],
            'tamanho'     => $validated['tamanho'],
            'responsavel' => $validated['responsavel'],
        ]);

        // Salva os veterinários no pivot
        if ($request->has('veterinarios')) {
            $fazenda->veterinarios()->sync($request->veterinarios);
        }

        return redirect()->route('fazendas.index')
            ->with('success', 'Fazenda cadastrada com sucesso!');
    }

    // TELA DE EDIÇÃO
    public function edit(Fazenda $fazenda)
    {
        $veterinarios = Veterinario::all();
        $fazenda->load('veterinarios');
        return view('fazendas.edit', compact('fazenda', 'veterinarios'));
    }

    // ATUALIZAR FAZENDA
    public function update(Request $request, Fazenda $fazenda)
    {
        $validated = $request->validate([
            'nome'        => 'required|string|unique:fazendas,nome,' . $fazenda->id,
            'tamanho'     => 'required|integer|min:1',
            'responsavel' => 'required|string',
            'veterinarios'=> 'array'
        ]);

        $fazenda->update([
            'nome'        => $validated['nome'],
            'tamanho'     => $validated['tamanho'],
            'responsavel' => $validated['responsavel'],
        ]);

        // Atualiza o pivot
        $fazenda->veterinarios()->sync($request->veterinarios ?? []);

        return redirect()->route('fazendas.index')
            ->with('success', 'Fazenda atualizada com sucesso!');
    }

    // EXCLUIR FAZENDA
    public function destroy(Fazenda $fazenda)
    {
        $fazenda->veterinarios()->detach();
        $fazenda->delete();

        return redirect()->route('fazendas.index')
            ->with('success', 'Fazenda removida com sucesso!');
    }
}
