<!-- Form de película -->
<form action="agregar_pelicula" method="POST" class="my-4">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Titulo de la película</label>
                <input required name="title" type="text" class="form-control">
            </div>
        </div>

        <div class="col-3">
            <div class="form-group">
                <label>Ano de lanzamiento</label>
                <input required name="year" type="number" class="form-control">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Duracion</label>
        <input required name="duracion" type="text" class="form-control">
    </div>

   

    <button type="submit" class="btn btn-primary mt-2">Guardar pelicula</button>
</form>
