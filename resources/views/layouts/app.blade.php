<!DOCTYPE html>
<html lang="es">
<head>
  {{-- Configuración básica --}}
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'CRUD Estudiantes')</title>

  {{-- Vite (CSS/JS) --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-white text-slate-800">

  {{-- Encabezado --}}
  <header class="border-b bg-blue-600 text-white">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
      {{-- Título --}}
      <a href="{{ route('students.index') }}" class="font-semibold text-lg">CRUD • Estudiantes</a>
      {{-- Menú --}}
      <nav class="flex items-center gap-4">
        <a href="{{ route('students.index') }}" class="hover:underline">Estudiantes</a>
        <a href="{{ route('careers.index') }}" class="hover:underline">Carreras</a>
      </nav>
    </div>
  </header>

  {{-- Contenido --}}
  <main class="max-w-6xl mx-auto px-4 py-6">
    {{-- Mensaje éxito --}}
    @if (session('success'))
      <div class="mb-4 rounded-lg bg-green-100 text-green-700 px-4 py-2">
        {{ session('success') }}
      </div>
    @endif

    {{-- Mensaje error --}}
    @if (session('error'))
      <div class="mb-4 rounded-lg bg-red-100 text-red-700 px-4 py-2">
        {{ session('error') }}
      </div>
    @endif

    {{-- Vista hija --}}
    @yield('content')
  </main>

  {{-- Pie --}}
  <footer class="border-t mt-6 py-4 text-center text-sm text-slate-500">
    © {{ date('Y') }} Hecho con Laravel + Tailwind. Yosef Duron
  </footer>

  {{-- Script global para eliminar (Estudiantes y Carreras) --}}
  <script>
    // Función Eliminar Estudiante
    function confirmDelete(id) {
      if (window.Swal) {
        Swal.fire({
          title: '¿Eliminar estudiante?',
          text: 'Esta acción no se puede deshacer.',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#2563EB',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sí, eliminar',
          cancelButtonText: 'Cancelar'
        }).then((r) => {
          if (r.isConfirmed) {
            const f = document.getElementById('delete-form-' + id);
            if (f) f.submit();
          }
        });
      } else {
        if (confirm('¿Eliminar estudiante?')) {
          const f = document.getElementById('delete-form-' + id);
          if (f) f.submit();
        }
      }
    }

    // Función Eliminar Carrera
    function confirmDeleteCareer(id) {
      if (window.Swal) {
        Swal.fire({
          title: '¿Eliminar carrera?',
          text: 'No podrás revertir esta acción.',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#2563EB',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sí, eliminar',
          cancelButtonText: 'Cancelar'
        }).then((r) => {
          if (r.isConfirmed) {
            const f = document.getElementById('delete-career-' + id);
            if (f) f.submit();
          }
        });
      } else {
        if (confirm('¿Eliminar carrera?')) {
          const f = document.getElementById('delete-career-' + id);
          if (f) f.submit();
        }
      }
    }
  </script>

  {{-- Scripts por vista (opcional) --}}
  @stack('scripts')
</body>
</html>

