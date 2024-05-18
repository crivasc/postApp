<!-- <div><a id="novo" href="#" onclick="ejecutar('.box2')">News</a></div> -->
<?php require_once "views/layout/admin/header.php"; ?>
<div class="container bg-light">
    <div class="row justify-content-center">
        <div class="col-sm-8 border my-5">
            <!-- <a href="< ?= BASE_URL ?>?page=post&opcion=crear">Nuevo</a> -->
            <div id="novo" role="button"><a class="text-primary">Nuevo item</a></div>
            <table class="table">
                <tr>
                    <td>Orden</td>
                    <td>Titulo</td>
                    <td>Acción</td>
                </tr>
                <?php if(!empty($data)): ?>
                    <?php foreach ($data as $val) :?>
                        <tr>
                            <td><?= $val->titulo ?></td>
                            <td><?= $val->fecha ?></td>
                            <td>
                                <a href="<?= BASE_URL ?>?page=post&opcion=editar&id=<?= $val->id ?>">Editar</a>

                                <a href="<?= BASE_URL ?>?page=post&opcion=eliminar&id=<?= $val->id ?>" onclick="return confirm('Seguro?')">Eliminar</a>   
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <p>No hay registros</p>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>
<?php require_once "views/layout/admin/footer.php"; ?>