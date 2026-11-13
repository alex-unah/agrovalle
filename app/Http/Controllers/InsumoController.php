<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;

class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $insumos = Insumo::latest()->paginate(10);
        return view('insumos.index', compact('insumos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('insumos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|unique:insumos,codigo',
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string',
            'precio' => 'required|numeric|min:1',
            'costo' => 'required|numeric',
            'inventario' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'fabricante' => 'required|string',
            'fecha_ven' => 'required|date',
            'fecha_reg' => 'required|date',
            'num_lote' => 'required|string'
        ]);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');

            $nombreImagen = uniqid() . '.' . $imagen->extension();

            $imagen->move(public_path('uploads/insumos'), $nombreImagen);
        }

        Insumo::create([
            'codigo' => $request-> codigo,
            'nombre' => $request-> nombre,
            'categoria' => $request-> categoria,
            'precio' => $request-> precio,
            'costo' => $request-> costo,
            'inventario' => $request-> inventario,
            'imagen' => $nombreImagen,
            'fabricante' => $request-> fabricante,
            'fecha_ven' => $request-> fecha_ven,
            'fecha_reg' => $request-> fecha_reg,
            'num_lote' => $request-> num_lote
        ]);

        return redirect()->route('insumos.index')
                         ->with('success', '¡Insumo registrado exitosamente en el inventario!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Insumo $insumo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insumo $insumo)
    {
        return view('insumos.edit', compact('insumo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Insumo $insumo)
    {
        $request->validate([
            'codigo' => 'required|string|max:255|unique:insumos,codigo,' . $insumo->id,
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string',
            'precio' => 'required|numeric|min:1',
            'costo' => 'required|numeric',
            'inventario' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'fabricante' => 'required|string',
            'fecha_ven' => 'required|date',
            'fecha_reg' => 'required|date',
            'num_lote' => 'required|string'
        ]);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');

            $nombreImagen = uniqid() . '.' . $imagen->extension();

            $imagen->move(public_path('uploads/insumos'), $nombreImagen);
        }

        $insumo->update([
            'codigo' => $request-> codigo,
            'nombre' => $request-> nombre,
            'categoria' => $request-> categoria,
            'precio' => $request-> precio,
            'costo' => $request-> costo,
            'inventario' => $request-> inventario,
            'imagen' => $nombreImagen,
            'fabricante' => $request-> fabricante,
            'fecha_ven' => $request-> fecha_ven,
            'fecha_reg' => $request-> fecha_reg,
            'num_lote' => $request-> num_lote
        ]);

        return redirect()->route('insumos.index')
                         ->with('success', '¡Insumo actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Insumo $insumo)
    {
        $insumo->delete();

        return redirect()->route('insumos.index')
                         ->with('success', '¡Insumo eliminado del inventario!');
    }
}
