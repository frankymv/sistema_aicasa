<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePoblacionesProductoRequest;
use App\Models\PoblacionProducto;
use Illuminate\Http\Request;

class PoblacionProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poblacionesProductos = PoblacionProducto::orderBy('id', 'desc')
        ->paginate(10);
        return view('poblacion-productos.index', compact('poblacionesProductos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('poblacion-productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePoblacionesProductoRequest $request)
    {

        $validated = $request->validated();

        PoblacionProducto::create($validated);

        return redirect()
            ->route('poblacion-productos.index')
            ->with('success', 'La población producto fue creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PoblacionProducto $poblacionProducto)
    {

        //dd($poblacionesProducto);
        return view('poblacion-productos.show', [
            'poblacionProducto' => $poblacionProducto,
            'readonly' => true,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PoblacionProducto $poblacionProducto)
    {

        return view('poblacion-productos.edit', [
            'poblacionProducto' => $poblacionProducto,
            'readonly' => false,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePoblacionesProductoRequest $request, PoblacionProducto $poblacionProducto)
    {

        $validated = $request->validated();
        $poblacionProducto->update($validated);

        return redirect()
            ->route('poblacion-productos.index')
            ->with('success', 'La población producto fue actualizada correctamente.');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PoblacionProducto $poblacionProducto)
    {
          $poblacionProducto->delete();

        return redirect()
            ->route('poblacion-productos.index')
            ->with('success', 'La población producto fue eliminada correctamente.');
    }
}
