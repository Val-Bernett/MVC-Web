<?php
require_once __DIR__ . '/model/conexion.php';
if (session_status() === PHP_SESSION_NONE) session_start();

$conexion = Conexion::conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = htmlspecialchars(trim($_POST['nombre']));

    $stmt = mysqli_prepare($conexion, "SELECT id, nombre FROM usuarios WHERE nombre = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 's', $nombre);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($res);
    mysqli_stmt_close($stmt);

    if ($user) {
        $_SESSION['usuario'] = $user['nombre'];
        header('Location: mvc-app/index.php?action=index'); // ✅ va al controlador
        exit;
    } else {
        echo '<p style="color:red;">Usuario no encontrado.</p>';
    }
}
?>
<form method="POST" action="login.php" aria-label="Formulario de login">
  <label for="nombre">Nombre</label>
  <input id="nombre" name="nombre" required>
  <button type="submit">Entrar</button>


  <a href="mvc-app/index.php?action=create" class="btn-secondary">Registrarse</a>


  <a href="index.html" class="btn-secondary">Volver al inicio</a>
</form>

<style>
  body {
    font-family: 'Inter', sans-serif;
    background: #f0f2f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }
  form {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    width: 300px;
    display: flex;
    flex-direction: column;
    align-items: stretch;
  }
  label {
    margin-bottom: 10px;
    color: #555;
  }
  input {
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  button, .btn-secondary {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
    margin-bottom: 10px;
    text-decoration: none;
    display: block;
  }
  button:hover, .btn-secondary:hover {
    background-color: #0056b3;
  }
  form[aria-label="Formulario de login"] {
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: box-shadow 0.3s ease;
  }
  form[aria-label="Formulario de login"]:hover {
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
  }
  p {
    text-align: center;
  }
  p[style*="color:red;"] {
    color: red;
    margin-top: 10px;
  }
</style>
