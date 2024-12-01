<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Exercicio;

class ExercicioController extends Controller {

    public function __construct() {
		$this->authorizeResource(Exercicio::class, 'exercicio');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $exercicios = Exercicio::query();

        if(!empty($request->search)) {
			$exercicios->where('nome', 'like', '%' . $request->search . '%');
		}

        $exercicios = $exercicios->paginate(10);

        return view('exercicios.index', compact('exercicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('exercicios.create', []);
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

            $exercicio = new Exercicio();
            $exercicio->nome = $request->nome;
            $exercicio->save();

            return redirect()->route('exercicios.index', [])->with('success', __('Exercicio created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('exercicios.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Exercicio $exercicio
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Exercicio $exercicio,) {

        return view('exercicios.show', compact('exercicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Exercicio $exercicio
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Exercicio $exercicio,) {

        return view('exercicios.edit', compact('exercicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exercicio $exercicio) {

        $request->validate([]);

        try {
            $exercicio->nome = $request->nome;
            $exercicio->save();

            return redirect()->route('exercicios.index', [])->with('success', __('Exercicio edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('exercicios.edit', compact('exercicio'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Exercicio $exercicio
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercicio $exercicio,) {

        try {
            $exercicio->delete();

            return redirect()->route('exercicios.index', [])->with('success', __('Exercicio deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('exercicios.index', [])->with('error', 'Cannot delete Exercicio: ' . $e->getMessage());
        }
    }

    
}
