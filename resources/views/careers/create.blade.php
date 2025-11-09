@extends('layouts.app')
@section('title','Registrar carrera')

@section('content')
{{-- Formulario para registrar nueva carrera --}}
<h1 class="text-2xl font-semibold text-blue-700 mb-4">Registrar nueva carrera</h1>

<form class="bg-white border rounded-xl p-6 max-w-2xl" method="POST" action="{{ route('careers.store') }}">
  @csrf

  {{-- Campo nombre --}}
  <label class="block mb-4">
    <span class="block text-sm font-medium text-slate-700">Nombre de la carrera</span>
    <input type="text" name="nombre" value="{{ old('nombre') }}"
           class="mt-1 w-full rounded-lg border-slate-300 focus:ring-blue-500 focus:border-blue-500">
  </label>

  {{-- Botones de acción --}}
  <div class="mt-6 flex gap-2">
    <a href="{{ route('careers.index') }}" class="rounded-lg border px-4 py-2">Cancelar</a>
    <button class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Registrar</button>
  </div>
</form>
@endsection
