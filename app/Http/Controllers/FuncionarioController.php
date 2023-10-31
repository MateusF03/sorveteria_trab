<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Funcionario/Index', [
            'funcionarios' => Funcionario::all(),
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
            'email' => 'required|string|email',
            'telefone' => 'required|string',
        ]);
        Funcionario::create($data);
        return redirect(route('funcionarios.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Funcionario $funcionario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Funcionario $funcionario)
    {
        return Inertia::render('Funcionario/Edit', [
            'funcionario' => $funcionario,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        $data = $request->validate([
            'nome' => 'required|string',
            'email' => 'required|string|email',
            'telefone' => 'required|string',
        ]);
        $funcionario->update($data);
        return redirect(route('funcionarios.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();
        return redirect()->to(route('funcionarios.index'))->setStatusCode(303);
    }
}
