<?php

namespace App\Http\Controllers;

use App\Models\MatricesProducto;
use App\Models\PoblacionProducto;
use App\Models\PorcionProducto;
use App\Models\Producto;
use App\Models\TamanioPorcion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $productos = Producto::with([
            'matrizProducto',
            'poblacionProducto',
            'porcionProducto',
            'tamanioPorcion',
        ])
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view(
            'productos.index',
            compact('productos')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $matrices = MatricesProducto::orderBy('codigo')
            ->get();

        $poblaciones = PoblacionProducto::orderBy('codigo')
            ->get();

        $porciones = PorcionProducto::orderBy('codigo')
            ->get();

        $tamanios = TamanioPorcion::orderBy('codigo')
            ->get();

        return view('productos.create',
            compact(
                'matrices',
                'poblaciones',
                'porciones',
                'tamanios'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


          $validated = $request->validate([

            'codigo_producto' => [
                'required',
                'string',
                'max:20',
                'unique:productos,codigo_producto',
            ],

            'nombre_producto' => [
                'required',
                'string',
                'max:255',
            ],

            'matriz_producto_id' => [
                'required',
                'exists:matrices_productos,id',
            ],

            'poblacion_producto_id' => [
                'required',
                'exists:poblacion_productos,id',
            ],

            'porcion_producto_id' => [
                'required',
                'exists:porcion_productos,id',
            ],

            'tamanio_porcion_id' => [
                'required',
                'exists:tamanio_porcions,id',
            ],

        ], [

            'codigo_producto.required' =>
                'El código del producto es obligatorio.',

            'codigo_producto.unique' =>
                'El código del producto ya está registrado.',

            'codigo_producto.max' =>
                'El código no puede superar los 20 caracteres.',

            'nombre_producto.required' =>
                'El nombre del producto es obligatorio.',

            'matriz_producto_id.required' =>
                'Debe seleccionar una matriz de producto.',

            'matriz_producto_id.exists' =>
                'La matriz seleccionada no existe.',

            'poblacion_producto_id.required' =>
                'Debe seleccionar una población objetivo.',

            'poblacion_producto_id.exists' =>
                'La población seleccionada no existe.',

            'porcion_producto_id.required' =>
                'Debe seleccionar una porción.',

            'porcion_producto_id.exists' =>
                'La porción seleccionada no existe.',

            'tamanio_porcion_id.required' =>
                'Debe seleccionar un tamaño de porción.',

            'tamanio_porcion_id.exists' =>
                'El tamaño de porción seleccionado no existe.',
        ]);

        Producto::create($validated);

        return redirect()
            ->route('productos.index')
            ->with(
                'success',
                'El producto fue creado correctamente.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
                $matrices = MatricesProducto::orderBy('matriz_base')
            ->get();

        $poblaciones = PoblacionProducto::orderBy('poblacion_objetivo')
            ->get();

        $porciones = PorcionProducto::orderBy('codigo')
            ->get();

        $tamanios = TamanioPorcion::orderBy('codigo')
            ->get();

         $producto->load([
            'matrizProducto',
            'poblacionProducto',
            'porcionProducto',
            'tamanioPorcion',
        ]);

        return view('productos.show',
            compact('producto',
                'matrices',
                'poblaciones',
                'porciones',
                'tamanios',
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        $matrices = MatricesProducto::orderBy('matriz_base')
            ->get();

        $poblaciones = PoblacionProducto::orderBy('poblacion_objetivo')
            ->get();

        $porciones = PorcionProducto::orderBy('codigo')
            ->get();

        $tamanios = TamanioPorcion::orderBy('codigo')
            ->get();

        return view(
            'productos.edit',
            compact(
                'producto',
                'matrices',
                'poblaciones',
                'porciones',
                'tamanios'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
          $validated = $request->validate([

            'codigo_producto' => [
                'required',
                'string',
                'max:20',

                // Permite mantener el mismo código
                Rule::unique(
                    'productos',
                    'codigo_producto'
                )->ignore($producto->id),
            ],

            'nombre_producto' => [
                'required',
                'string',
                'max:255',
            ],

            'matriz_producto_id' => [
                'required',
                'exists:matrices_productos,id',
            ],

            'poblacion_producto_id' => [
                'required',
                'exists:poblacion_productos,id',
            ],

            'porcion_producto_id' => [
                'required',
                'exists:porcion_productos,id',
            ],

            'tamanio_porcion_id' => [
                'required',
                'exists:tamanio_porcions,id',
            ],

        ], [

            'codigo_producto.required' =>
                'El código del producto es obligatorio.',

            'codigo_producto.unique' =>
                'El código del producto ya está registrado.',

            'nombre_producto.required' =>
                'El nombre del producto es obligatorio.',

            'matriz_producto_id.required' =>
                'Debe seleccionar una matriz de producto.',

            'poblacion_producto_id.required' =>
                'Debe seleccionar una población objetivo.',

            'porcion_producto_id.required' =>
                'Debe seleccionar una porción.',

            'tamanio_porcion_id.required' =>
                'Debe seleccionar un tamaño de porción.',
        ]);

        $producto->update($validated);

        return redirect()
            ->route('productos.index')
            ->with(
                'success',
                'El producto fue actualizado correctamente.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
          $producto->delete();

        return redirect()
            ->route('productos.index')
            ->with(
                'success',
                'El producto fue eliminado correctamente.'
            );
    }
}
