<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Objetivo;

class ObjetivoController extends Controller {

    public function __construct() {
		$this->authorizeResource(Objetivo::class, 'objetivo');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $objetivos = Objetivo::query();


        $objetivos = $objetivos->get();

        return view('objetivos.index', compact('objetivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('objetivos.create', []);
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

            $objetivo = new Objetivo();
            $objetivo->nome = $request->nome;
            $objetivo->save();

            return redirect()->route('objetivos.index', [])->with('success', __('Objetivo created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('objetivos.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Objetivo $objetivo
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Objetivo $objetivo,) {

        return view('objetivos.show', compact('objetivo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Objetivo $objetivo
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Objetivo $objetivo,) {

        return view('objetivos.edit', compact('objetivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Objetivo $objetivo,) {

        $request->validate([]);

        try {
            $objetivo->nome = $request->nome;
            $objetivo->save();

            return redirect()->route('objetivos.index', [])->with('success', __('Objetivo edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('objetivos.edit', compact('objetivo'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Objetivo $objetivo
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Objetivo $objetivo,) {

        try {
            $objetivo->delete();

            return redirect()->route('objetivos.index', [])->with('success', __('Objetivo deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('objetivos.index', [])->with('error', 'Cannot delete Objetivo: ' . $e->getMessage());
        }
    }


}
