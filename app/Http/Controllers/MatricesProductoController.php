<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatricesProductoRequest;
use App\Models\MatricesProducto;
use Illuminate\Http\Request;

class MatricesProductoController extends Controller
{

    public function index()
    {
        $matrices = MatricesProducto::latest()->paginate(10);
        return view('matrices-productos.index', compact('matrices'));
    }

    public function create()
    {
        return view('matrices-productos.create');

    }

    public function store(StoreMatricesProductoRequest $request)
    {
        MatricesProducto::create($request->validated());
        return redirect()
            ->route('matrices-productos.index')
            ->with('success', 'Matriz registrada correctamente.');
    }

    public function show(MatricesProducto $matricesProducto)
    {
        return view('matrices-productos.show', [
            'matricesProducto' => $matricesProducto
        ]);
    }

    public function edit(MatricesProducto $matricesProducto)
    {

        return view('matrices-productos.edit', [
            'matricesProducto' => $matricesProducto
        ]);
    }

    public function update(Request $request, MatricesProducto $matricesProducto)
    {

        $matricesProducto->update($request->validated());

        return redirect()
            ->route('matrices-productos.index')
            ->with('success', 'Registro actualizado correctamente.');
    }

    public function destroy(MatricesProducto $matricesProducto)
    {
        $matricesProducto->delete();

        return redirect()
            ->route('matrices-productos.index')
            ->with('success', 'Matriz eliminada correctamente.');
    }
}
