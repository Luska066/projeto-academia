<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Plano;

class PlanoController extends Controller {

    public function __construct() {
		$this->authorizeResource(Plano::class, 'plano');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $planos = Plano::query();

        if(!empty($request->search)) {
			$planos->where('nome', 'like', '%' . $request->search . '%');
		}

        $planos = $planos->paginate(10);

        return view('planos.index', compact('planos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('planos.create', []);
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

            $plano = new Plano();
            $plano->nome = $request->nome;
            $plano->save();

            return redirect()->route('planos.index', [])->with('success', __('Plano created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('planos.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Plano $plano
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Plano $plano,) {

        return view('planos.show', compact('plano'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Plano $plano
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Plano $plano,) {

        return view('planos.edit', compact('plano'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plano $plano,) {

        $request->validate([]);

        try {
            $plano->nome = $request->nome;
            $plano->save();

            return redirect()->route('planos.index', [])->with('success', __('Plano edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('planos.edit', compact('plano'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Plano $plano
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plano $plano,) {

        try {
            $plano->delete();

            return redirect()->route('planos.index', [])->with('success', __('Plano deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('planos.index', [])->with('error', 'Cannot delete Plano: ' . $e->getMessage());
        }
    }

    
}
