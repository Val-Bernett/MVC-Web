# Proyecto Web2 - MVC ejemplo

Contenido:
- Archivos estáticos: index.html, estilos.css
- Archivos PHP procedural básicos: conexion.php, registro.php, listar.php, editar.php, eliminar.php, login.php
- MVC app en `mvc-app/`:
  - model/conexion.php
  - model/usuarioModel.php
  - controller/usuarioController.php
  - view/formulario.php
  - view/lista.php
  - index.php (en mvc-app/)

Instrucciones rápidas:
1. Crear la base de datos MySQL:
   CREATE DATABASE web2;
   USE web2;
   CREATE TABLE usuarios (
     id INT AUTO_INCREMENT PRIMARY KEY,
     nombre VARCHAR(100)
   );
2. Copiar los archivos al directorio de tu servidor web (htdocs, www, /var/www/html, etc).
3. Ajustar credenciales en conexion.php si es necesario.
4. Para usar la app MVC abre `mvc-app/index.php?action=index`.

Checklist entregable:
- [x] index.html con header/nav/section/footer y formulario POST
- [x] conexion.php
- [x] registro.php, listar.php, editar.php, eliminar.php
- [x] login.php con session_start
- [x] estilos.css responsive
- [x] Estructura MVC básica
- [x] Workflow .github/workflows/deploy.yml (requiere configurar secretos en GitHub)

Notas de seguridad y accesibilidad:
- Se usan sentencias preparadas para evitar SQL Injection.
- Formularios incluyen atributos aria y validación mínima.
- En producción, proteger endpoints con CSRF, HTTPS y mejores políticas de sesión.

