<?php

class GenreModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=nombre_base_de_datos;charset=utf8', 'root', '');
    }

    public function getAllGenres() {
        $query = $this->db->prepare('SELECT * FROM genero');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function addGenre($name) {
        $query = $this->db->prepare('INSERT INTO genero (nombre) VALUES(?)');
        $query->execute([$name]);

        return $this->db->lastInsertId();
    }
}