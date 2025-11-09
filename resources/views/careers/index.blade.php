@extends('layouts.app')
@section('title','Carreras')

@section('content')
{{-- Listado de carreras --}}
<div class="flex items-center justify-between mb-4">
  <h1 class="text-2xl font-semibold text-blue-700">Listado de Carreras</h1>
  <a href="{{ route('careers.create') }}" class="rounded-lg bg-blue-600 px-4 py-2 text-white font-medium hover:bg-blue-700">
    Nueva carrera
  </a>
</div>

{{-- Tabla de carreras --}}
<div class="overflow-x-auto bg-white border rounded-xl">
  <table class="min-w-full divide-y">
    <thead class="bg-blue-50">
      <tr>
        <th class="px-4 py-3 text-left text-sm font-semibold">ID</th>
        <th class="px-4 py-3 text-left text-sm font-semibold">Nombre</th>
        <th class="px-4 py-3"></th>
      </tr>
    </thead>
    <tbody class="divide-y">
      {{-- Ciclo para mostrar carreras --}}
      @forelse ($careers as $career)
      <tr class="hover:bg-blue-50 transition-colors">
        <td class="px-4 py-3">{{ $career->id }}</td>
        <td class="px-4 py-3">{{ $career->nombre }}</td>
        <td class="px-4 py-3 text-right">
          {{-- Botón editar --}}
          <a href="{{ route('careers.edit', $career->id) }}" class="text-blue-600 hover:text-blue-800 font-medium mr-3">Editar</a>
          {{-- Botón eliminar --}}
          <form id="delete-career-{{ $career->id }}" action="{{ route('careers.destroy', $career->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="button" onclick="confirmDeleteCareer({{ $career->id }})"
                    class="text-red-600 hover:text-red-700 font-medium">Eliminar</button>
          </form>
        </td>
      </tr>
      @empty
      <tr><td class="px-4 py-3" colspan="3">No hay registros.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

{{-- Script para confirmar eliminación --}}
<script>
  function confirmDeleteCareer(id) {
    if (confirm('¿Seguro que deseas eliminar esta carrera?')) {
      document.getElementById('delete-career-' + id).submit();
    }
  }
</script>
@endsection

