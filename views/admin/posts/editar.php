<div class="card-body">
    <form  id="post-form" action="<?= BASE_URL ?>?page=post&opcion=editar" method="post" class="row g-2">
        <div class="input-group row g-2">
            <input type="text" class="form-control" id='textitulo' name="txtitulo" value="" required>
        </div>
        <div class="input-group row g-2 customEditor d-flex justify-content-center">
            <textarea type="text" class="form-control" id="txtcont1" name="txtcont" cols="30" rows="10" value=""></textarea>
        </div>
        <div class="col-6 mx-auto d-flex justify-items-center gap-2">
        <input type="hidden" name="txtid" value="">
            <a role="button" class="col btn btn-danger btn-block modalCloser cancelpost" name="btncancelar">Cancelar</a>
            <button type="submit" class="col btn btn-primary btn-block" name="btnguardar">Guardar</button>
        </div>
    </form>
</div>
