<div class="card-body">
    <form  id="post-form" cass="postForms" action="<?= BASE_URL ?>?page=post&opcion=insertar" method="post" class="row g-2 validar"
        novalidate>
        <div class="input-group row g-2">
            <input type="text" class="form-control" name="txtitulo" placeholder="Titulo" required>
        </div>
        <div class="input-group row g-2 customEditor d-flex justify-content-center">
            <textarea type="text" class="form-control" id="txtcont" name="txtcont" cols="30" rows="10" required></textarea>
        </div>
        <div class="col-6 mx-auto d-flex justify-items-center gap-2">
            <a role="button" class="col btn btn-danger btn-block modalCloser cancelpost" name="btncancelar">Cancelar</a>
            <button type="submit" class="col btn btn-primary btn-block" name="btnguardar">Guardar</button>
        </div>
    </form>
</div>