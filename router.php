<?php
require_once 'config.php';
require_once 'libs/router.php';
require_once 'app/controllers/movie.api.controller.php';
require_once 'app/helpers/auth.helpers.php';

$router = new Router();

#                 endpoint      verbo     controller             método
$router->addRoute('peliculas',  'GET',    'MovieApiController',   'get');
$router->addRoute('peliculas',  'POST',   'MovieApiController',   'create');
$router->addRoute('peliculas/:ID', 'GET',    'MovieApiController',   'get');
$router->addRoute('peliculas/:ID', 'PUT',    'MovieApiController',   'update');
$router->addRoute('peliculas/:ID', 'DELETE', 'MovieApiController',   'delete');

$router->addRoute('peliculas/:ID/:subrecurso', 'GET',    'MovieApiController', 'getMovieSubresource');
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
?>

<?php
require_once './app/controllers/movie.controller.php';
require_once './app/controllers/auth.controller.php';

define('mysql:host=localhost;dbname=cine;charset=utf8', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = isset($_GET['action']) ? $_GET['action'] : 'listar';

$movieController = new MovieController();
$authHelper = new AuthHelper();


// Ejecuta la acción correspondiente
switch ($action) {
    case 'listar':
        $controller->showMovies();
        break;
    case 'agregar':
        $controller->addMovie();
        break;
    case 'eliminar':
        $controller->removeMovie($_GET['id']);
        break;
    case 'login':
        $controller-> showLogin($user);
        break;
     case 'verify':
        $controller->verify();
        break;
    case 'logout':
        $controller-> logout();
        break;
    default:
        echo "404 Página no encontrada";
}

