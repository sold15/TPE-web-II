<?php

class UserModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=cine;charset=utf8', 'root', '');
    }

    public function getByEmail($email) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE email = ?');
        $query->execute([$email]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insertarUsuario($nombre, $email, $password) {
        $query = $this->db->prepare('INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)');
        $exito = $query->execute([$nombre, $email, $password]);

        return $exito;
    }
}