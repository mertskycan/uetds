<?php

namespace App\Http\Controllers;

use App\CompanyModel;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
        $CompanyModel = CompanyModel::latest()->paginate(5);

        return view('Company.index', compact('CompanyModel'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Company.create');
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

        CompanyModel::create($request->all());

        return redirect()->route('company.index')
            ->with('success', 'CompanyModel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CompanyModel  $companyModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companyModel = CompanyModel::with('user')->findOrFail($id);
        return view('Company.show', compact('companyModel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanyModel  $companyModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companyModel = CompanyModel::findOrFail($id);

        return view('Company.edit', compact('companyModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyModel  $companyModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyModel $companyModel)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $companyModel->update($request->all());

        return redirect()->route('company.index')
            ->with('success', 'CompanyModel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyModel  $companyModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyModel $companyModel)
    {

    $companyModel->update($request->all());

    return redirect()->route('company.index')
        ->with('success', 'CompanyModel updated successfully');
    }
}
