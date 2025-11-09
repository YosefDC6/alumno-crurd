@extends('layouts.app')
@section('title','Nueva carrera')
@section('content')
<h1 class="text-2xl font-semibold text-blue-700 mb-4">Nueva carrera</h1>

<form class="bg-white border rounded-xl p-6 max-w-lg" method="POST" action="{{ route('careers.store') }}">
  @csrf
  <label class="block mb-3">
    <span class="block text-sm font-medium text-slate-700">Nombre</span>
    <input type="text" name="nombre" value="{{ old('nombre') }}"
           class="mt-1 w-full rounded-lg border-slate-300 focus:border-blue-500 focus:ring-blue-500 @error('nombre') border-red-500 @enderror">
    @error('nombre') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
  </label>

  <div class="mt-6 flex gap-2">
    <a href="{{ route('careers.index') }}" class="rounded-lg border px-4 py-2">Cancelar</a>
    <button class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Guardar</button>
  </div>
</form>
@endsection
