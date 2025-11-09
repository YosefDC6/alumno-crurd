<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CareerController extends Controller
{
    // Función para mostrar lista de carreras
    public function index()
    {
        $careers = Career::orderBy('nombre')->paginate(10);
        return view('careers.index', compact('careers'));
    }

    // Función para mostrar formulario de registro
    public function create()
    {
        return view('careers.create');
    }

    // Función para guardar nueva carrera
    public function store(Request $request)
    {
        // Validación de datos
        $data = $request->validate([
            'nombre' => ['required','string','max:100','unique:careers,nombre'],
        ]);

        // Guardar registro
        Career::create($data);
        return redirect()->route('careers.index')->with('success','Carrera creada correctamente.');
    }

    // Función para mostrar formulario de edición
    public function edit($id)
    {
        $career = Career::findOrFail($id);
        return view('careers.edit', compact('career'));
    }

    // Función para actualizar carrera
    public function update(Request $request, $id)
    {
        $career = Career::findOrFail($id);

        // Validación de datos
        $data = $request->validate([
            'nombre' => ['required','string','max:100', Rule::unique('careers','nombre')->ignore($career->id)],
        ]);

        // Actualizar registro
        $career->update($data);
        return redirect()->route('careers.index')->with('success','Carrera actualizada correctamente.');
    }

    // Función para eliminar carrera
    public function destroy($id)
    {
        $career = Career::findOrFail($id);

        // Validar si tiene estudiantes relacionados
        if ($career->students()->exists()) {
            return back()->with('error','No se puede eliminar una carrera con estudiantes asociados.');
        }

        // Eliminar registro
        $career->delete();
        return redirect()->route('careers.index')->with('success','Carrera eliminada correctamente.');
    }
}
