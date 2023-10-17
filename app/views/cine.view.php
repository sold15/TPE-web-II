<?php 
class MovieView {
    public function showMovies($movies) {
    
        if (empty($movies)) {
            $error = "No se encontraron películas.";
            $this->showError($error);
        } else {
            require 'templates/movieList.php';
        }
    }

    public function showError($error) {
        require 'templates/error.php';
    }
}

?>