@extends('layouts.app')
@section('title','Editar estudiante')
@section('content')
<h1 class="text-2xl font-semibold text-blue-700 mb-4">Editar estudiante</h1>
<form class="bg-white border rounded-xl p-6 max-w-2xl" method="POST" action="{{ route('students.update', $student->id) }}">
  @csrf
  @method('PUT')
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <label class="block">
      <span class="block text-sm font-medium text-slate-700">Nombre</span>
      <input type="text" name="nombre" value="{{ old('nombre', $student->nombre) }}" class="mt-1 w-full rounded-lg border-slate-300 focus:border-blue-500 focus:ring-blue-500">
    </label>
    <label class="block">
      <span class="block text-sm font-medium text-slate-700">Correo</span>
      <input type="email" name="correo" value="{{ old('correo', $student->correo) }}" class="mt-1 w-full rounded-lg border-slate-300 focus:border-blue-500 focus:ring-blue-500">
    </label>
    <label class="block">
      <span class="block text-sm font-medium text-slate-700">Carrera</span>
      <select name="career_id" class="mt-1 w-full rounded-lg border-slate-300 focus:border-blue-500 focus:ring-blue-500">
        @foreach ($careers as $c)
          <option value="{{ $c->id }}" @selected(old('career_id', $student->career_id) == $c->id)>{{ $c->nombre }}</option>
        @endforeach
      </select>
    </label>
    <label class="block">
      <span class="block text-sm font-medium text-slate-700">Semestre</span>
      <input type="number" min="1" max="12" name="semestre" value="{{ old('semestre', $student->semestre) }}" class="mt-1 w-full rounded-lg border-slate-300 focus:border-blue-500 focus:ring-blue-500">
    </label>
  </div>
  <div class="mt-6 flex gap-2">
    <a href="{{ route('students.index') }}" class="rounded-lg border px-4 py-2">Cancelar</a>
    <button class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Actualizar</button>
  </div>
</form>
@endsection
