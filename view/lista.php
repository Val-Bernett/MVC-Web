<div class="container">
  <div class="card">
    <h2>Lista de usuarios</h2>
    <?php
    if (isset($_SESSION['mensaje'])) {
        echo '<div class="message">' . htmlspecialchars($_SESSION['mensaje']) . '</div>';
        unset($_SESSION['mensaje']);
    }
    ?>
    <a href="index.php?action=create" class="btn">Nuevo usuario</a>
    <ul>
      <?php foreach ($usuarios as $u): ?>
        <li>
          <span><?php echo htmlspecialchars($u['nombre']); ?></span>
          <div>
            <a href="index.php?action=edit&id=<?php echo (int)$u['id']; ?>">Editar</a> |
            <a href="index.php?action=delete&id=<?php echo (int)$u['id']; ?>" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</a>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
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
  ul {
    list-style-type: none;
    padding: 0;
  }
  li {
    background: #f9f9f9;
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 4px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .message {
    background-color: #d4edda;
    color: #155724;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 15px;
    border: 1px solid #c3e6cb;
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
  a {
    color: #007BFF;
    text-decoration: none;
  }
  a:hover {
    text-decoration: underline;
  }
    ul li div a {
        margin: 0 5px;
    }
    ul li div a:hover {
            text-decoration: underline;
        }
</style>
