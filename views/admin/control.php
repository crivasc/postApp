<?php require_once "views/layout/admin/header.php"; ?>

<div id="Control" class="container-fluid p-0">
    <div id="navegacion" class="container-fluid bg-light shadow-sm rounded">
        <?php require_once 'views/layout/admin/topnav.php'; ?>
    </div>
    <div id="main" class="container">

        <?php require_once "views/layout/admin/alertas.php"; ?>
        <div class="row justify-content-center">
            <div class="col-sm-8 border my-5 rounded">
            <!--  -->
                <div class="row d-flex justify-content-between p-2">
                    <h5 class="fs-5 my-2 col-4 text-uppercase text-light"><i class="icofont-list"></i> Posts</h5>
                    <a id="novo" role="button"
                        class="btn btn-small d-flex align-content-center justify-content-center bg-primary rounded-pill col-1 py-1">
                        <i class="icofont-plus-circle text-light fs-4 mx-2"></i>
                        <small
                            class="tip text-light animate__animated animate__faster visually-hidden">Nuevo</small>
                    </a>
                </div>
            <!--  -->
                <div class="d-flex justify-content-between">
                     <a role="button" class="badge d-flex justify-content-center align-items-center" href="<?=BASE_URL?>">
                        <i class="icofont-home fs-5"></i>   
                        &nbsp;Ir al home
                    </a>
                    <a role="button" id="sort" class="badge d-flex justify-content-center align-items-center">Ver&nbsp;<span class="ordmsg">asc</span> 
                        <span class="badge text-light fs-6"><i class="icofont-sort"></i></span>
                    </a>
                </div>
            <!--  -->
                <table id="listado" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Data</th>
                            <th>Creado en</th>
                            <th>Actualización</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($data)): ?>
                        <?php 
                            usort($data, function($a, $b) {
                                return strtotime($b->fecha) - strtotime($a->fecha);
                            }); 
                        ?>
                        <?php $counter = 0; foreach ($data as $key => $val) :?>
                        <?php
                                $send = [];
                                $send = json_encode($item = array(
                                    'uid'       => $val -> id,
                                    'titulo'    => $val -> titulo,
                                    'contenido' => $val -> contenido,
                                    'fecha'     => $val -> fecha,
                                    'updated'   => $val -> updated
                                ));
                            ?>
                        <tr>
                            <td><span class="fs-6"><?= $counter = $counter + 1; ?>.</span></td>
                            <td>
                                <p class="fs-6"><?= $val->titulo ?></p>
                            </td>
                            <td><small class="text-secondary"><?= $val->fecha ?></small></td>
                            <td><small class="text-secondary"><?= $val->updated ?></small></td>
                            <td>
                                <a role="button" class="verPost fs-5 mx-2 text-success" item='<?= $send ?>'><i
                                        class="icofont-maximize"></i></a>
                                <a role="button" class="editPost fs-5 mx-2 text-warning" item='<?= $send ?>'><i
                                        class="icofont-edit"></i></a>
                                <a class="fs-5 mx-2 text-danger"
                                    href="<?= BASE_URL ?>?page=post&opcion=eliminar&id=<?= $val->id ?>"
                                    onclick="return confirm('Esta acción no se puede deshacer')"><i
                                        class="icofont-delete-alt"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                    <?php else: ?>
                    <p>No hay registros</p>
                    <?php endif; ?>
                </table>
            <!--  -->
            </div>
        </div>
    </div>
</div>

<?php require_once "views/layout/admin/footer.php"; ?>
