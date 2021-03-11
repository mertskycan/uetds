<?php

namespace App\Http\Controllers;

use App\SeferModel;
use Illuminate\Http\Request;

class SeferController extends Controller
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
        $SeferModel = SeferModel::latest()->paginate(5);

        return view('Sefer.index', compact('SeferModel'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sefer.create');
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
            'introduction' => 'required',
            'location' => 'required',
            'cost' => 'required'
        ]);

        SeferModel::create($request->all());

        return redirect()->route('Sefer.index')
            ->with('success', 'SeferModel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SeferModel  $seferModel
     * @return \Illuminate\Http\Response
     */
    public function show(SeferModel $seferModel)
    {
        return view('Sefer.show', compact('seferModel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SeferModel  $seferModel
     * @return \Illuminate\Http\Response
     */
    public function edit(SeferModel $seferModel)
    {
        return view('Sefer.edit', compact('seferModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SeferModel  $seferModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeferModel $seferModel)
    {
        $request->validate([
            'name' => 'required',
            'introduction' => 'required',
            'location' => 'required',
            'cost' => 'required'
        ]);
        $seferModel->update($request->all());

        return redirect()->route('Sefer.index')
            ->with('success', 'SeferModel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SeferModel  $seferModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeferModel $seferModel)
    {
         $request->validate([
        'name' => 'required',
        'introduction' => 'required',
        'location' => 'required',
        'cost' => 'required'
    ]);
    $seferModel->update($request->all());

    return redirect()->route('Sefer.index')
        ->with('success', 'SeferModel updated successfully');
    }
}
