<?php
require_once './app/models/movie.model.php';
require_once './app/views/cine.view.php';
require_once './app/helpers/auth.helper.php';

class MovieController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new MovieModel();
        $this->view = new MovieView();
    }

    public function showMovies() {
        // lista de películas desde el modelo.
        $movies = $this->model->getMovies();

        // Mostrar las películas 
        $this->view->showMovies($movies);
    }

    public function addMovie() {
        $title = $_POST['title'];
        $duration = $_POST['duration'];
        $releaseYear = $_POST['releaseYear'];

        // validaciones

        if (empty($title) || empty($releaseYear)) {
            $this->view->showError("Debes completar todos los campos obligatorios.");
            return;
        }
        // Insertar la película
        $id = $this->model->insertMovie($title, $duration, $releaseYear);

        if ($id) {
            header('Location: ' . 'http://localhost/TPE-web-II/templates/movieList.php');
        } else {
            $this->view->showError("Error al insertar la película.");
        }
    }

    public function removeMovie($id) {
        // Eliminar una película 
        $this->model->deleteMovie($id);

        header('Location: ' . 'http://localhost/TPE-web-II/templates/movieList.php');
    }

}