<div id="main" class="container-fluid d-flex justify-content-center vh-100 overflow-y-auto">
    <div class="container row">
        <section class="">
            <div id="postList" class="contenido my-5">

                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <div class="">
                            <i class="icofont-automation" style="font-size:6rem; color:rgb(2 67 71);"></i>
                        </div>
                        
                        <h5 class="card-title"><?=SITE_NAME?></h5>
                        <p class="card-text"></p>
                        <a href="<?=BASE_URL.'?page=login'?>" target="_blank" class="btn btn-secondary shadow-sm">Login</a>
                    </div>
                </div>
                <?php if(!empty($data)): ?>

                <?php  usort($data, function($a, $b) {
                    return strtotime($b->fecha) - strtotime($a->fecha);
                }); ?>

                <?php $counter = 0; foreach ($data as $key => $val) :?>
                <div class="card shadow-sm">

                    <div class="card-body">
                        <h5 class="card-title fs-3"><?= $val->titulo ?></h5>
                        <p class="card-text"><?= $val->contenido ?></p>
                    </div>
                </div>
                <?php endforeach ?>
                <?php else: ?>
                <p>No hay registros</p>
                <?php endif; ?>
        </section>
    </div>
</div>