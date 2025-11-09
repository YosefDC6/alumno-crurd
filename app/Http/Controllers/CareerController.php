<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::orderBy('nombre')->paginate(10);
        return view('careers.index', compact('careers'));
    }

    public function create()
    {
        return view('careers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required','string','max:100','unique:careers,nombre'],
        ]);
        Career::create($data);
        return redirect()->route('careers.index')->with('success','Carrera creada correctamente.');
    }

    public function edit($id)
    {
        $career = Career::findOrFail($id);
        return view('careers.edit', compact('career'));
    }

    public function update(Request $request, $id)
    {
        $career = Career::findOrFail($id);
        $data = $request->validate([
            'nombre' => ['required','string','max:100', Rule::unique('careers','nombre')->ignore($career->id)],
        ]);
        $career->update($data);
        return redirect()->route('careers.index')->with('success','Carrera actualizada correctamente.');
    }

    public function destroy($id)
    {
        $career = Career::findOrFail($id);
        if ($career->students()->exists()) {
            return back()->with('error','No se puede eliminar una carrera que tiene estudiantes asociados.');
        }
        $career->delete();
        return redirect()->route('careers.index')->with('success','Carrera eliminada correctamente.');
    }
}
