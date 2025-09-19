<div class="container">
  <div class="card">
<?php
$editing = isset($usuario);
?>
<h2><?php echo $editing ? 'Editar usuario' : 'Nuevo usuario'; ?></h2>
<form method="POST" action="<?= BASE_URL ?>index.php?action=<?= $editing ? 'edit' : 'create' ?>">
  <?php if ($editing): ?>
    <input type="hidden" name="id" value="<?php echo (int)$usuario['id']; ?>">
  <?php endif; ?>
  <label>Nombre:
    <input name="nombre" value="<?php echo $editing ? htmlspecialchars($usuario['nombre']) : ''; ?>" required>
  </label>
  <button type="submit"><?php echo $editing ? 'Actualizar' : 'Crear'; ?></button>
</form>
<a href="index.html" class="btn">Volver al inicio</a>
  </div>
</div>

<style>
  .container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    font-family: 'Inter', sans-serif;
  }
  .card {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    padding: 20px;
  }
  h2 {
    margin-bottom: 20px;
    color: #333;
  }
  form label {
    display: block;
    margin-bottom: 10px;
    color: #555;
  }
  form input {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  form button {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
  }
  form button:hover {
    background-color: #0056b3;
  }
  a {
    display: inline-block;
    margin-top: 15px;
    color: #007BFF;
    text-decoration: none;
  }
  a:hover {
    text-decoration: underline;
  }

  form[aria-label="User Form"] {
          box-shadow: 0 4px 8px rgba(0,0,0,0.1);
          transition: box-shadow 0.3s ease;
  }
  form[aria-label="User Form"]:hover {
          box-shadow: 0 8px 16px rgba(0,0,0,0.2);
  }
  .btn {
    display: inline-block;
    background: #007BFF;
    color: #fff;
    padding: 8px 12px;
    border-radius: 4px;
    margin-top: 10px;
    text-decoration: none;
  }
  .btn:hover {
    background: #0056b3;
  } 
</style>
