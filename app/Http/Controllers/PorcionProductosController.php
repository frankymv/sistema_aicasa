<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePorcionProductoRequest;
use App\Models\PorcionProducto;

use Illuminate\Http\Request;

class PorcionProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $porciones = PorcionProducto::latest()->paginate(10);

        return view('porcion-productos.index', compact('porciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('porcion-productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePorcionProductoRequest $request)
    {
        PorcionProducto::create(
            $request->validated()
            );
        return redirect()
        ->route('porcion-productos.index')
        ->with('success', 'Registro creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PorcionProducto $porcionProducto)
    {
        return view('porcion-productos.show', [
        'porcionProducto' => $porcionProducto
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PorcionProducto $porcionProducto)
    {
        return view('porcion-productos.edit', [
            'porcion' => $porcionProducto
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePorcionProductoRequest $request, PorcionProducto $porcionProducto)
    {
        $porcionProducto->update(
        $request->validated()
        );
        return redirect()
        ->route('porcion-productos.index')
        ->with('success', 'Registro actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PorcionProducto $porcionProducto)
    {
        $porcionProducto->delete();

        return redirect()
        ->route('porcion-productos.index')
        ->with('success', 'Registro eliminado correctamente.');
    }
}
