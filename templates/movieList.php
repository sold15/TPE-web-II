<?php require 'templates/header.php'; ?>
<?php require 'templates/form_agregar_pelicula.php'; ?>

<ul class="list-group">
<?php foreach($movies as $movie): ?>
    <li class="list-group-item <?php if($movie->vista): ?>vista<?php endif ?>">
        <div>
            <b><?= $movie->titulo ?></b> | Duracion: <?= $movie->duracion ?> | Año: <?= $movie->ano ?>
        </div>
        <div class="actions">
            <?php if(!$movie->vista): ?> 
                <a href="marcar_vista/<?= $movie->id ?>" class='btn btn-success'>Marcar como vista</a> 
            <?php endif ?>
            <a href="eliminar_pelicula/<?= $movie->id ?>" class='btn btn-danger'>Eliminar</a>
        </div>
    </li>
<?php endforeach ?>
</ul>

<p class="mt-3"><small>Mostrando <?= count($movies) ?> películas</small></p>

<?php require 'templates/footer.phtml'; ?>