<?php

namespace App\Http\Controllers;

use App\Models\Gado;
use App\Models\Fazenda;
use App\Repositories\GadoRepository;
use Illuminate\Http\Request;

class GadoController extends Controller
{
    protected GadoRepository $gadoRepository;

    public function __construct(GadoRepository $gadoRepository)
    {
        $this->gadoRepository = $gadoRepository;
    }

    // LISTAGEM
    public function index()
    {
        $gados = Gado::with('fazenda')->paginate(10);
        $totalLeite = $this->gadoRepository->totalLeiteSemana();

        return view('gados.index', compact('gados', 'totalLeite'));
    }

    // FORMULÁRIO DE CADASTRO
    public function create()
    {
        $fazendas = Fazenda::all();
        return view('gados.create', compact('fazendas'));
    }

    // SALVAR COM REGRA DE NEGÓCIO
    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo'     => 'required|string|unique:gados,codigo',
            'leite'      => 'required|integer|min:0',
            'racao'      => 'required|integer|min:0',
            'peso'       => 'required|integer|min:0',
            'nascimento' => 'required|date',
            'abatido'    => 'boolean',
            'fazenda_id' => 'required|exists:fazendas,id',
        ]);

        $validated['abatido'] = $validated['abatido'] ?? false;

        // 🔒 REGRA: LIMITE DE GADO POR HECTARE
        $fazenda = Fazenda::findOrFail($validated['fazenda_id']);
        $limite = $fazenda->tamanho * 18;

        $totalGados = Gado::where('fazenda_id', $fazenda->id)
            ->where('abatido', false)
            ->count();

        if ($totalGados >= $limite) {
            return back()
                ->withErrors([
                    'fazenda_id' => "Esta fazenda já atingiu o limite máximo de {$limite} animais."
                ])
                ->withInput();
        }

        Gado::create($validated);

        return redirect()->route('gados.index')
            ->with('success', 'Gado cadastrado com sucesso!');
    }

    // VISUALIZAR
    public function show(Gado $gado)
    {
        $gado->load('fazenda');
        return view('gados.show', compact('gado'));
    }

    // EDITAR (BLOQUEIA SE ABATIDO)
    public function edit(Gado $gado)
    {
        if ($gado->abatido) {
            return redirect()->route('gados.index')
                ->with('error', 'Animal abatido não pode ser editado.');
        }

        $fazendas = Fazenda::all();
        return view('gados.edit', compact('gado', 'fazendas'));
    }

    // ATUALIZAR (BLOQUEIA SE ABATIDO)
    public function update(Request $request, Gado $gado)
    {
        if ($gado->abatido) {
            return back()->with('error', 'Animal abatido não pode ser alterado.');
        }

        $validated = $request->validate([
            'codigo'     => 'required|string|unique:gados,codigo,' . $gado->id,
            'leite'      => 'required|integer|min:0',
            'racao'      => 'required|integer|min:0',
            'peso'       => 'required|integer|min:0',
            'nascimento' => 'required|date',
            'abatido'    => 'boolean',
            'fazenda_id' => 'required|exists:fazendas,id',
        ]);

        $validated['abatido'] = $validated['abatido'] ?? false;

        $gado->update($validated);

        return redirect()->route('gados.index')
            ->with('success', 'Gado atualizado com sucesso!');
    }

    // EXCLUIR (BLOQUEIA SE ABATIDO)
    public function destroy(Gado $gado)
    {
        if ($gado->abatido) {
            return back()->with('error', 'Não é permitido excluir um animal abatido.');
        }

        $gado->delete();

        return redirect()->route('gados.index')
            ->with('success', 'Gado removido com sucesso!');
    }

    // 🩸 ABATER
    public function abater($id)
    {
        $gado = Gado::findOrFail($id);

        if (!$gado->podeIrParaAbate()) {
            return back()->with('error', 'Este animal não atende às regras para abate.');
        }

        $gado->abatido = true;
        $gado->save();

        return back()->with('success', 'Animal enviado para abate com sucesso.');
    }

    // 🩸 RELATÓRIO DE ABATIDOS
    public function abatidos()
    {
        $gados = Gado::with('fazenda')
            ->where('abatido', true)
            ->paginate(10);

        return view('gados.abatidos', compact('gados'));
    }
}
