<?php

class MovieModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=cine;charset=utf8', 'root', '');
    }
   
    function getMovies() {
        $query = $this->db->prepare('SELECT * FROM peliculas');
        $query->execute();

        $movies = $query->fetchAll(PDO::FETCH_OBJ);

        return $movies;
    }

    function insertMovie($title, $duracion, $releaseYear) {
        $query = $this->db->prepare('INSERT INTO peliculas (titulo, duracion, anoEstreno) VALUES(?,?,?,?,?)');
        $query->execute([$title, $duracion, $releaseYear]);

        return $this->db->lastInsertId();
    }

    function deleteMovie($id) {
        $query = $this->db->prepare('DELETE FROM peliculas WHERE id = ?');
        $query->execute([$id]);
    }

    function updateMovieData($title, $duration, $releaseYear) {
        $query = $this->db->prepare('UPDATE peliculas SET titulo = ?, descripcion = ?, genero = ?, director = ?, ano = ? WHERE id = ?');
        $query->execute([$title, $duration, $releaseYear]);
    }
}