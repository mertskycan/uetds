<?php

namespace App\Http\Controllers;

use App\SoforModel;
use Illuminate\Http\Request;

class SoforController extends Controller
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
        $SoforModel = SoforModel::with('company')->latest()->paginate(5);

        return view('Sofor.index', compact('SoforModel'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sofor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        SoforModel::create($request->all());

        return redirect()->route('sofor.index')
            ->with('success', 'SoforModel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SoforModel  $soforModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $soforModel = SoforModel::with('company')->findOrFail($id);
        return view('Sofor.show', compact('soforModel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SoforModel  $soforModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $soforModel = SoforModel::with('company')->findOrFail($id);
        return view('Sofor.edit', compact('soforModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SoforModel  $soforModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SoforModel $soforModel)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $soforModel->update($request->all());

        return redirect()->route('sofor.index')
            ->with('success', 'SoforModel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SoforModel  $soforModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoforModel $soforModel)
    {
         $request->validate([
        'name' => 'required',
        'introduction' => 'required',
        'location' => 'required',
        'cost' => 'required'
    ]);
    $soforModel->update($request->all());

    return redirect()->route('sofor.index')
        ->with('success', 'SoforModel updated successfully');
    }
}
