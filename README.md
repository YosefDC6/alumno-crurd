🧩 Proyecto: CRUD de Estudiantes y Carreras

Este proyecto consiste en el desarrollo de un **sistema CRUD completo** utilizando **Laravel 12** y **Tailwind CSS**.  
El objetivo es aplicar los conceptos de **rutas, controladores, migraciones, modelos, relaciones y vistas** bajo la arquitectura **MVC**, reforzando las bases del desarrollo backend con PHP y la organización de aplicaciones web modernas.

------------------------------------------------------------

📖 Descripción general

💻 Funcionalidad principal  
El sistema permite **registrar, listar, editar y eliminar estudiantes**, cada uno asociado a una **carrera** registrada previamente en el sistema.  
También se incluye un CRUD independiente para la gestión de carreras, con validaciones y relaciones correctas.

[Vista del listado de estudiantes](public/images/Captura%20de%20pantalla%202025-11-09%20105035.png)  
[Vista del formulario de nuevo estudiante](public/images/Captura%20de%20pantalla%202025-11-09%20105036.png)
[Vista del formulario de carreras](public/images/Captura%20de%20pantalla%202025-11-09%20105137.png)
[Vista del boton eliminar](public/images/Captura%20de%20pantalla%202025-11-09%20112939.png)

------------------------------------------------------------

🔗 Enlaces del proyecto

Repositorio en GitHub: [https://github.com/YosefDC6/alumno-crurd]  
Sitio en ejecución (local): [http://127.0.0.1:8000/]

------------------------------------------------------------

🧠 Proceso de desarrollo

🛠️ Tecnologías utilizadas  
- Laravel 12 (Framework PHP)  
- Tailwind CSS  
- SQLite / MySQL  
- Blade Templates  
- SweetAlert2 (para confirmaciones de eliminación)  
- Vite (compilación de assets)  

------------------------------------------------------------

🚀 Estructura del proyecto

El proyecto se organiza en las siguientes secciones principales:

- **Modelos:** `Student`, `Career`  
- **Controladores:** `StudentController`, `CareerController`  
- **Vistas:** Carpeta `resources/views`  
  - `layouts/app.blade.php` → Estructura base del sitio  
  - `students/` → CRUD completo de estudiantes  
  - `careers/` → CRUD completo de carreras  
- **Rutas:** definidas en `routes/web.php` mediante `Route::resource()`  
- **Migraciones:** `create_students_table` y `create_careers_table`  

------------------------------------------------------------

🧮 Funcionalidades principales

✅ Registrar nuevos estudiantes con los campos:
- Nombre  
- Correo  
- Carrera  
- Semestre  

✅ CRUD completo de carreras  
✅ Listado general con relación entre estudiante y carrera  
✅ Edición y eliminación funcionales  
✅ Validaciones en todos los formularios  
✅ Mensajes de éxito y error  
✅ Diseño limpio y responsivo con Tailwind  

------------------------------------------------------------

💡 Lo que aprendí

Durante el desarrollo de este proyecto aprendí a:
- Implementar un **CRUD completo** con Laravel.  
- Configurar y usar **migraciones, controladores y modelos** correctamente.  
- Aplicar **relaciones Eloquent (hasMany / belongsTo)** entre tablas.  
- Diseñar interfaces limpias con **Tailwind CSS**.  
- Gestionar **mensajes flash** y validaciones con Blade.  
- Usar **SweetAlert2** para interacciones dinámicas.  

------------------------------------------------------------

🚀 Áreas de mejora

- Implementar un **buscador avanzado** de estudiantes y carreras.  
- Agregar **filtros** por carrera o semestre.  
- Mejorar la estética con componentes de interfaz (modales, badges).  
- Añadir autenticación básica (login / roles).  

------------------------------------------------------------

📚 Recursos útiles

- Documentación oficial de Laravel: https://laravel.com/docs  
- Guía oficial de Tailwind CSS: https://tailwindcss.com/docs  
- SweetAlert2: https://sweetalert2.github.io/  
- PHP The Right Way: https://phptherightway.com/  
- MDN Web Docs (HTML & CSS): https://developer.mozilla.org/es/  

------------------------------------------------------------

👩‍💻 Autor

- **Nombre completo:** Yosef Yael Duron Cervantes  
- **Carrera:** Ingeniería en Tecnologías de la Información y Comunicación  
- **Grupo:** Programación Web TC1  
- **Correo institucional:** 22151208@aguascalientes.tecnm.mx  
- **GitHub:** [https://github.com/YosefDC6](https://github.com/YosefDC6)  
- **Instituto:** Instituto Tecnológico de Aguascalientes  

------------------------------------------------------------
