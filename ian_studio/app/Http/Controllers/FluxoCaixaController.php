<?php

namespace App\Http\Controllers;

use App\Helpers\StringUtils;
use App\Http\Enum\CargoEnum;
use App\Http\Enum\FluxoCaixa\Tipo;
use Illuminate\Http\Request;

use App\Models\FluxoCaixa;

class FluxoCaixaController extends Controller
{

    public function __construct()
    {
//        $this->authorizeResource(FluxoCaixa::class, 'fluxoCaixa');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $fluxoCaixa = FluxoCaixa::query();
        $receitas = FluxoCaixa::query()->whereIn('tipo', [
            Tipo::RECEITA->value,
            Tipo::PAGAMENTO->value,
        ])->get()->sum(['valor']);
        $despesas = FluxoCaixa::query()->whereIn('tipo', [
            Tipo::DESPESA->value,
        ])->get()->sum(['valor']);
        $lucro_liquido = $receitas - $despesas;
        if (!empty($request->search)) {
            $fluxoCaixa->where('tipo', 'like', '%' . $request->search . '%');
        }

        $fluxoCaixa = $fluxoCaixa->paginate(10);

        return view('fluxo_caixas.index', compact('fluxoCaixa','receitas','despesas','lucro_liquido'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('fluxo_caixas.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([]);

        try {

            $fluxoCaixa = new FluxoCaixa();
            $fluxoCaixa->tipo = $request->tipo;
            $fluxoCaixa->valor = StringUtils::unmaskMoney($request->valor);
            $fluxoCaixa->nome = $request->nome;
            $fluxoCaixa->id_user = auth()->id();
            $fluxoCaixa->feito_por = 'PAGAMENTO REALIZADO PELO SISTEMA';
            $fluxoCaixa->desconto = StringUtils::unmaskMoney($request->desconto);
            $fluxoCaixa->save();

            return redirect()->route('fluxo_caixa.index', [])->with('success', __('Fluxo Caixa created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('fluxo_caixa.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\FluxoCaixa $fluxoCaixa
     *
     * @return \Illuminate\Http\Response
     */
    public function show(FluxoCaixa $fluxoCaixa)
    {

        return view('fluxo_caixas.show', compact('fluxoCaixa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\FluxoCaixa $fluxoCaixa
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(FluxoCaixa $fluxoCaixa)
    {

        return view('fluxo_caixas.edit', compact('fluxoCaixa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FluxoCaixa $fluxoCaixa)
    {

        $request->validate([]);

        try {
            $fluxoCaixa->tipo = $request->tipo;
            $fluxoCaixa->valor = $request->valor;
            $fluxoCaixa->nome = $request->nome;
            $fluxoCaixa->id_user = $request->id_user;
            $fluxoCaixa->feito_por = $request->feito_por;
            $fluxoCaixa->desconto = $request->desconto;
            $fluxoCaixa->save();

            return redirect()->route('fluxo_caixa.index', [])->with('success', __('Fluxo Caixa edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('fluxo_caixa.edit', compact('fluxoCaixa'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\FluxoCaixa $fluxoCaixa
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(FluxoCaixa $fluxoCaixa)
    {

        try {
            $fluxoCaixa->delete();

            return redirect()->route('fluxo_caixa.index', [])->with('success', __('Fluxo Caixa deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('fluxo_caixa.index', [])->with('error', 'Cannot delete Fluxo Caixa: ' . $e->getMessage());
        }
    }


}
