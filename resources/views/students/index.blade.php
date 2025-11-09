@extends('layouts.app')
@section('title','Estudiantes')

@section('content')
{{-- Título y acciones principales --}}
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-4">
  <h1 class="text-2xl font-semibold text-blue-700">Listado de Estudiantes</h1>

  {{-- Barra de búsqueda y botón de agregar --}}
  <div class="flex items-center gap-2">
    <form method="GET" action="{{ route('students.index') }}" class="flex gap-2">
      <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar estudiante..."
             class="rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 px-3 py-2 w-64">
      <button class="rounded-lg bg-blue-600 px-4 py-2 text-white font-medium hover:bg-blue-700">Buscar</button>
    </form>

    <a href="{{ route('students.create') }}" 
       class="rounded-lg bg-blue-600 px-4 py-2 text-white font-medium hover:bg-blue-700">
       Nuevo estudiante
    </a>
  </div>
</div>

{{-- Tabla de estudiantes --}}
<div class="overflow-x-auto bg-white border rounded-xl">
  <table class="min-w-full divide-y">
    <thead class="bg-blue-50">
      <tr>
        <th class="px-4 py-3 text-left text-sm font-semibold">Nombre</th>
        <th class="px-4 py-3 text-left text-sm font-semibold">Correo</th>
        <th class="px-4 py-3 text-left text-sm font-semibold">Carrera</th>
        <th class="px-4 py-3 text-left text-sm font-semibold">Semestre</th>
        <th class="px-4 py-3"></th>
      </tr>
    </thead>
    <tbody class="divide-y">
      {{-- Ciclo para mostrar cada estudiante --}}
      @forelse ($students as $student)
      <tr class="hover:bg-blue-50 transition-colors">
        <td class="px-4 py-3">{{ $student->nombre }}</td>
        <td class="px-4 py-3">{{ $student->correo }}</td>
        <td class="px-4 py-3">{{ $student->career->nombre }}</td>
        <td class="px-4 py-3">{{ $student->semestre }}</td>
        <td class="px-4 py-3 text-right">
          {{-- Botón para editar --}}
          <a href="{{ route('students.edit', $student->id) }}" 
             class="text-blue-600 hover:text-blue-800 font-medium mr-3">
             Editar
          </a>

          {{-- Botón para eliminar --}}
          <form id="delete-form-{{ $student->id }}" 
                action="{{ route('students.destroy', $student->id) }}" 
                method="POST" 
                class="inline">
            @csrf
            @method('DELETE')
            <button type="button" onclick="confirmDelete({{ $student->id }})"
                    class="text-red-600 hover:text-red-700 font-medium">
              Eliminar
            </button>
          </form>
        </td>
      </tr>
      @empty
      {{-- Mensaje cuando no hay registros --}}
      <tr><td class="px-4 py-3" colspan="5">Sin registros disponibles.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

{{-- Paginación --}}
<div class="mt-4">{{ $students->links() }}</div>

{{-- Script para confirmar eliminación --}}
<script>
  function confirmDelete(id) {
    if (confirm('¿Seguro que deseas eliminar este estudiante?')) {
      document.getElementById('delete-form-' + id).submit();
    }
  }
</script>
@endsection
