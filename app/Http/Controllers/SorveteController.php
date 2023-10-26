<?php

namespace App\Http\Controllers;

use App\Models\Sorvete;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SorveteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Sorvete/Index', [
            'sorvetes' => Sorvete::all(),
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
            'sabor' => 'required|string|unique:sorvetes,sabor',
            'preco' => 'required|numeric|min:1',
        ]);
        Sorvete::create($data);
        return redirect(route('sorvetes.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Sorvete $sorvete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sorvete $sorvete)
    {
        return Inertia::render('Sorvete/Edit', [
            'sorvete' => $sorvete,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sorvete $sorvete)
    {
        $data = $request->validate([
            'sabor' => 'required|string|unique:sorvetes,sabor,' . $sorvete->id,
            'preco' => 'required|numeric|min:1',
        ]);
        $sorvete->update($data);
        return redirect()->to(route('sorvetes.index'))->setStatusCode(303);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sorvete $sorvete)
    {
        $sorvete->delete();
        return redirect()->to(route('sorvetes.index'))->setStatusCode(303);
    }
}
