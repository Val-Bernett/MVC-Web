<?php
require_once __DIR__ . '/../model/usuarioModel.php';

class UsuarioController {
    public function index() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $usuarios = UsuarioModel::obtenerTodos();
        include __DIR__ . '/../view/lista.php';
    }

    public function showForm($usuario = null) {
        include __DIR__ . '/../view/formulario.php';
    }

    public function create($post) {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $nombre = htmlspecialchars(trim($post['nombre']));
        if ($nombre !== '') {
            UsuarioModel::crear($nombre);
            $_SESSION['mensaje'] = "Usuario registrado con éxito.";
        }
        header("Location: " . BASE_URL . "index.php?action=index");
        exit;
    }

    public function editForm($id) {
        $usuario = UsuarioModel::obtenerPorId($id);
        include __DIR__ . '/../view/formulario.php';
    }

    public function update($post) {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $id = (int)$post['id'];
        $nombre = htmlspecialchars(trim($post['nombre']));
        if ($id && $nombre !== '') {
            UsuarioModel::actualizar($id, $nombre);
            $_SESSION['mensaje'] = "Usuario actualizado.";
        }
        header("Location: " . BASE_URL . "index.php?action=index");
        exit;
    }

    public function delete($id) {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if ($id) {
            UsuarioModel::eliminar($id);
            $_SESSION['mensaje'] = "Usuario eliminado.";
        }
        header("Location: " . BASE_URL . "index.php?action=index");
        exit;
    }
}
