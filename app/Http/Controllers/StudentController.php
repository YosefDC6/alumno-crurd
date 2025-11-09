<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    // Función para mostrar lista de estudiantes
    public function index(Request $request)
    {
        $query = Student::with('career');
        if ($search = $request->search) {
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                  ->orWhere('correo', 'like', "%{$search}%");
            });
        }
        $students = $query->orderBy('nombre')->paginate(10)->withQueryString();
        return view('students.index', compact('students'));
    }

    // Función para mostrar formulario de registro
    public function create()
    {
        $careers = Career::orderBy('nombre')->get();
        return view('students.create', compact('careers'));
    }

    // Función para guardar nuevo estudiante
    public function store(Request $request)
    {
        // Validación de datos
        $data = $request->validate([
            'nombre'    => ['required','string','max:120'],
            'correo'    => ['required','email','max:150','unique:students,correo'],
            'career_id' => ['required','exists:careers,id'],
            'semestre'  => ['required','integer','min:1','max:12'],
        ]);

        // Guardar registro
        Student::create($data);
        return redirect()->route('students.index')->with('success','Estudiante registrado correctamente.');
    }

    // Función para mostrar formulario de edición
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $careers = Career::orderBy('nombre')->get();
        return view('students.edit', compact('student','careers'));
    }

    // Función para actualizar estudiante
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        // Validación de datos
        $data = $request->validate([
            'nombre'    => ['required','string','max:120'],
            'correo'    => ['required','email','max:150', Rule::unique('students','correo')->ignore($student->id)],
            'career_id' => ['required','exists:careers,id'],
            'semestre'  => ['required','integer','min:1','max:12'],
        ]);

        // Actualizar registro
        $student->update($data);
        return redirect()->route('students.index')->with('success','Estudiante actualizado correctamente.');
    }

    // Función para eliminar estudiante
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success','Estudiante eliminado correctamente.');
    }
}

