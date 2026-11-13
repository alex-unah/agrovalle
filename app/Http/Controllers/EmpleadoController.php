<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::latest()->paginate(10);
        return view('empleados.index', compact('empleados'));
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
            'identidad' => 'required|string|min:13|max:13|unique:empleados,identidad',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|string|unique:empleados,correo',
            'cargo' => 'required|string',
            'salario' => 'required|numeric',
            'fecha_ing' => 'required|date',
            'estado' => 'required|boolean'
        ]);

        Empleado::create($request->all());

        return redirect()->route('empleados.index')
                         ->with('success', '¡Empleado registrado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'identidad' => 'required|string|min:13|max:13|unique:empleados,identidad'. $empleado->id,
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|string|unique:empleados,correo'. $empleado->id,
            'cargo' => 'required|string',
            'salario' => 'required|numeric',
            'fecha_ing' => 'required|date',
            'estado' => 'required|boolean'
        ]);

        $empleado->update($request->all());

        return redirect()->route('empleados.index')
                         ->with('success', '¡Empleado actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')
                         ->with('success', '¡Empleado eliminado del inventario!');
    }
}
