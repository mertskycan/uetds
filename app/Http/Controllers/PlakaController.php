<?php

namespace App\Http\Controllers;

use App\PlakaModel;
use Illuminate\Http\Request;

class PlakaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PlakaModel = PlakaModel::latest()->paginate(5);

        return view('Plaka.index', compact('PlakaModel'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Plaka.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        PlakaModel::create($request->all());

        return redirect()->route('plaka.index')
            ->with('success', 'PlakaModel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlakaModel  $plakaModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plakaModel = PlakaModel::with('company')->findOrFail($id);
        return view('Plaka.show', compact('plakaModel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlakaModel  $plakaModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plakaModel = PlakaModel::with('company')->findOrFail($id);
        return view('Plaka.edit', compact('plakaModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlakaModel  $plakaModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $plakaModel = PlakaModel::findOrFail($id);
        $plakaModel->update($request->all());

        return redirect()->route('plaka.index')
            ->with('success', 'PlakaModel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlakaModel  $plakaModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plakaModel = PlakaModel::with('company')->findOrFail($id);
        $plakaModel->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully');
    }
}
