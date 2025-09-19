<?php
require_once 'conexion.php';

class UsuarioModel {
    public static function obtenerTodos() {
        $conexion = Conexion::conectar();
        $res = $conexion->query("SELECT * FROM usuarios");
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public static function crear($nombre) {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre) VALUES (?)");
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $stmt->close();
    }

    public static function obtenerPorId($id) {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        $user = $res->fetch_assoc();
        $stmt->close();
        return $user;
    }

    public static function actualizar($id, $nombre) {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("UPDATE usuarios SET nombre = ? WHERE id = ?");
        $stmt->bind_param("si", $nombre, $id);
        $stmt->execute();
        $stmt->close();
    }

    public static function eliminar($id) {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
