<?php

if (!class_exists('Conexion')) {
    class Conexion {
        private $conn;

        public function __construct() {
            $host = "localhost";
            $user = "root";   
            $pass = "";       
            $db   = "web2";   

            $this->conn = new mysqli($host, $user, $pass, $db);
            if ($this->conn->connect_error) {
                die("Error de conexión: " . $this->conn->connect_error);
            }
        }

        // método de instancia
        public function getConexion() {
            return $this->conn;
        }

 
        public static function conectar() {
            $c = new self();
            return $c->getConexion();
        }
    }
}


if (!isset($conexion) || !($conexion instanceof mysqli)) {
    $conexion = Conexion::conectar();
}
