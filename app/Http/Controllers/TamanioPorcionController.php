<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTamanioPorcionRequest;
use App\Models\TamanioPorcion;
use Illuminate\Http\Request;

class TamanioPorcionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tamaniosPorciones = TamanioPorcion::orderBy('id', 'desc')
            ->paginate(10);

        return view('tamanio-porcions.index',
            compact('tamaniosPorciones')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('tamanio-porcions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTamanioPorcionRequest $request)
    {
        TamanioPorcion::create(
            $request->validated()
            );
        return redirect()
        ->route('tamanio-porcions.index')
        ->with('success', 'Registro creado correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(TamanioPorcion $tamanioPorcion)
    {
        return view('tamanio-porcions.show', [
            'tamanioPorcion' => $tamanioPorcion,
            'readonly' => true,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TamanioPorcion $tamanioPorcion)
    {

        return view('tamanio-porcions.edit', [
            'tamanioPorcion' => $tamanioPorcion,
            'readonly' => false,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTamanioPorcionRequest $request, TamanioPorcion $tamanioPorcion)
    {

        $tamanioPorcion->update($request->validated());
        return redirect()
            ->route('tamanio-porcions.index')
            ->with('success', 'Registro actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TamanioPorcion $tamanioPorcion)
    {
        $tamanioPorcion->delete();

        return redirect()
            ->route('tamanio-porcions.index')
            ->with(
                'success',
                'El tamaño de porción fue eliminado correctamente.'
            );
    }
}
