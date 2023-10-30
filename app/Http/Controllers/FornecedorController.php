<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Fornecedor/Index', [
            'fornecedores' => Fornecedor::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string',
            'endereco' => 'required|string',
        ]);
        Fornecedor::create($data);
        return redirect(route('fornecedores.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fornecedor $fornecedore)
    {
        return Inertia::render('Fornecedor/Edit', [
            'fornecedor' => $fornecedore,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fornecedor $fornecedore)
    {
        $data = $request->validate([
            'nome' => 'required|string',
            'endereco' => 'required|string',
        ]);
        Fornecedor::findOrFail($fornecedore->id)->update($data);
        return redirect(route('fornecedores.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fornecedor $fornecedore)
    {
        $fornecedore->delete();
        return redirect()->to(route('fornecedores.index'))->setStatusCode(303);
    }
}
