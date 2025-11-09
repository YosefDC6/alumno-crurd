<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','CRUD Estudiantes')</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-800">
  <header class="border-b bg-blue-600 text-white">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
      <a href="{{ route('students.index') }}" class="font-semibold text-lg">CRUD • Estudiantes</a>
      <nav class="flex items-center gap-4">
        <a class="hover:underline" href="{{ route('students.index') }}">Estudiantes</a>
        <a class="hover:underline" href="{{ route('careers.index') }}">Carreras</a>
      </nav>
    </div>
  </header>

  <main class="max-w-6xl mx-auto bg-white rounded-2xl shadow-sm px-6 py-6 mt-6">
    {{-- Mensajes flash --}}
    @if (session('success'))
      <div class="mb-4 rounded-lg border border-blue-200 bg-blue-50 text-blue-800 px-4 py-3">
        {{ session('success') }}
      </div>
    @endif

    @if (session('error'))
      <div class="mb-4 rounded-lg border border-red-200 bg-red-50 text-red-800 px-4 py-3">
        {{ session('error') }}
      </div>
    @endif

    @if ($errors->any())
      <div class="mb-4 rounded-lg border border-red-200 bg-red-50 text-red-800 px-4 py-3">
        <p class="font-medium mb-1">Por favor corrige los siguientes errores:</p>
        <ul class="list-disc list-inside text-sm">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @yield('content')
  </main>

  <footer class="text-center text-sm text-slate-500 py-6">
    © {{ date('Y') }} Hecho con Laravel + Tailwind. Yosef Duron
  </footer>
</body>
</html>
