<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Model;

class ModelController extends Controller {

    public function __construct() {
		$this->authorizeResource(Model::class, 'model');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $models = Model::query();

        if(!empty($request->search)) {
			$models->where('id', 'like', '%' . $request->search . '%');
		}

        $models = $models->paginate(10);

        return view('models.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('models.create', []);
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

            $model = new Model();

            $model->save();

            return redirect()->route('models.index', [])->with('success', __('Model created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('models.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Model $model
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Model $model,) {

        return view('models.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Model $model
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Model $model,) {

        return view('models.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model $model,) {

        $request->validate([]);

        try {

            $model->save();

            return redirect()->route('models.index', [])->with('success', __('Model edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('models.edit', compact('model'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Model $model
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $model,) {

        try {
            $model->delete();

            return redirect()->route('models.index', [])->with('success', __('Model deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('models.index', [])->with('error', 'Cannot delete Model: ' . $e->getMessage());
        }
    }

    
}
