<?php

namespace App\Http\Controllers;

use App\Helpers\StringUtils;
use App\Models\PlanosValoree;
use Illuminate\Http\Request;

use App\Models\PlanosValore;

class PlanosValorController extends Controller {

    public function __construct() {
//		$this->authorizeResource(PlanosValore::class, 'planosValor');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $planosValor = PlanosValore::query();

        $planosValor = $planosValor->paginate(10);

        return view('planos_valors.index', compact('planosValor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('planos_valors.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ) {

        $request->validate([]);

        try {

            $planosValor = new PlanosValore();
            $planosValor->fill($request->all());
            $planosValor->valor = StringUtils::unmaskMoney($request->valor);
            $planosValor->desconto = StringUtils::unmaskMoney($request->desconto);
            $planosValor->save();

            return redirect()->route('planos_valor.index', [])->with('success', __('Planos Valor created successfully.'));
        } catch (\Throwable $e) {
            dd($e);
            return redirect()->route('planos_valor.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\PlanosValore $planosValor
     *
     * @return \Illuminate\Http\Response
     */
    public function show(PlanosValore $planosValor,) {

        return view('planos_valors.show', compact('planosValor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\PlanosValore $planosValor
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanosValore $planosValor,) {

        return view('planos_valors.edit', compact('planosValor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlanosValore $planosValor,) {

        $request->validate([]);

        try {

            $planosValor->fill($request->all());
            $planosValor->valor = StringUtils::unmaskMoney($request->valor);
            $planosValor->desconto = StringUtils::unmaskMoney($request->desconto);
            $planosValor->save();

            return redirect()->route('planos_valor.index', [])->with('success', __('Planos Valor edited successfully.'));
        } catch (\Throwable $e) {
            dd($e);
            return redirect()->route('planos_valor.edit', compact('planosValor'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PlanosValore $planosValor
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanosValore $planosValor,) {

        try {
            $planosValor->delete();

            return redirect()->route('planos_valors.index', [])->with('success', __('Planos Valor deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('planos_valors.index', [])->with('error', 'Cannot delete Planos Valor: ' . $e->getMessage());
        }
    }


}
