<?php

define("BASE_URL", "http://localhost:3000/mvc_project/");

session_start();
require_once 'controller/usuarioController.php';

$action = $_GET['action'] ?? 'index';
$controller = new UsuarioController();

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->create($_POST);
        } else {
            $controller->showForm();
        }
        break;
    case 'edit':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->update($_POST);
        } else {
            $controller->editForm($_GET['id']);
        }
        break;
    case 'delete':
        $controller->delete($_GET['id']);
        break;
    default:
        echo "Acción no válida.";
}
