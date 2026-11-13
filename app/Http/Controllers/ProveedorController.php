<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::latest()->paginate(10);
        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rtn' => 'required|string|min:14|max:14|unique:proveedores,rtn',
            'empresa' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
            'telefono' => 'required|integer|min:8|max:8|',
            'categoria' => 'required|string|max:255',
            'lim_credito' => 'required|numeric',
            'dias_credito' => 'required|integer',
            'estado' => 'required|boolean',
            'fecha_reg' => 'required|date'
        ]);

        Proveedor::create($request->all());

        return redirect()->route('proveedores.index')
                         ->with('success', '¡Proveedor registrado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
         $request->validate([
            'rtn' => 'required|string|min:14|max:14|unique:proveedores,rtn'. $proveedor->id,
            'empresa' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
            'telefono' => 'required|integer|min:8|max:8|',
            'categoria' => 'required|string|max:255',
            'lim_credito' => 'required|numeric',
            'dias_credito' => 'required|integer',
            'estado' => 'required|boolean',
            'fecha_reg' => 'required|date'
        ]);

        $proveedor->update($request->all());

        return redirect()->route('proveedores.index')
                         ->with('success', '¡Proveedor actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('proveedores.index')
                         ->with('success', '¡Proveedor eliminado del inventario!');
    }
}
