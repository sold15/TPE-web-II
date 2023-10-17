<?php

    require_once 'app/controllers/api.controller.php';
    
    require_once 'app/models/movie.model.php';
    
    class MovieApiController extends ApiController {
        private $model;
    
        function __construct() {
            parent::__construct();
            $this->model = new MovieModel();
        }
        function get($params = []) {
            if (empty($params)){
                $movies = $this->model->getMovies();
                $this->view->response($movies, 200);
            } else {
                $movies = $this->model->getMovies($params[':ID']); 
                if (!empty($movie)) {
                    if ($params[':subresource']) {
                        switch ($params[':subresource']) {
                            case 'title':
                                $this->view->response($movie->title, 200);
                                break;
                            case 'duracion':
                                $this->view->response($movie->duracion, 200); 
                                break;
                            case 'estreno':
                                $this->view->response($movie->releaseYear, 200); 
                                break;
                            default:
                                $this->view->response(
                                    'La película no contiene ' . $params[':subresource'] . '.',
                                    404
                                );
                                break;
                        }
                    } else {
                        $this->view->response($movie, 200);
                    }
                } else {
                    $this->view->response(
                        'La película con el id=' . $params[':ID'] . ' no existe.',
                        404
                    );
                }
            }
        }
        function delete($params = []) {
            $id = $params[':ID'];
            $movie = $this->model->getMovies($id);
    
            if ($movie) {
                $this->model->deleteMovie($id);
                $this->view->response('La película con id=' . $id . ' ha sido borrada.', 200);
            } else {
                $this->view->response('La película con id=' . $id . ' no existe.', 404);
            }
        }
    
        
        function create($params = []) {
            $body = $this->getData();
        
            $title = $body->title;
            $year = $body->year;
        
            $id = $this->model->insertMovie($title, null, null, null, $year);
        
            $this->view->response('La película fue insertada con el id=' . $id, 201);
        }
    
        function update($params = []) {
            $id = $params[':ID'];
            $movie = $this->model->getMovies($id);
    
            if ($movie) {
                $body = $this->getData();
                $title = $body->title;
                $description = $body->description;
                $director = $body->director;
                $year = $body->year;
                
                $this->model->updateMovieData($id, $title, $description, $director, $year);
    
                $this->view->response('La película con id=' . $id . ' ha sido modificada.', 200);
            } else {
                $this->view->response('La película con id=' . $id . ' no existe.', 404);
            }
        }
    }