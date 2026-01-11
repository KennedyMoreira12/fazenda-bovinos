<?php

namespace App\Http\Controllers;

use App\Models\Veterinario;
use Illuminate\Http\Request;

class VeterinarioController extends Controller
{
    // LISTAGEM
    public function index()
    {
        $veterinarios = Veterinario::all();
        return view('veterinarios.index', compact('veterinarios'));
    }

    // FORMULÁRIO DE CADASTRO
    public function create()
    {
        return view('veterinarios.create');
    }

    // SALVAR NO BANCO
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'crmv' => 'required|string|unique:veterinarios,crmv',
        ]);

        Veterinario::create($request->all());

        return redirect()
            ->route('veterinarios.index')
            ->with('success', 'Veterinário cadastrado com sucesso!');
    }

    // FORMULÁRIO DE EDIÇÃO
    public function edit(Veterinario $veterinario)
    {
        return view('veterinarios.edit', compact('veterinario'));
    }

    // ATUALIZAR
    public function update(Request $request, Veterinario $veterinario)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'crmv' => 'required|string|unique:veterinarios,crmv,' . $veterinario->id,
        ]);

        $veterinario->update($request->all());

        return redirect()
            ->route('veterinarios.index')
            ->with('success', 'Veterinário atualizado com sucesso!');
    }

    // EXCLUIR
    public function destroy(Veterinario $veterinario)
    {
        $veterinario->delete();

        return redirect()
            ->route('veterinarios.index')
            ->with('success', 'Veterinário removido com sucesso!');
    }
}
