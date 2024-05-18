<div id="alertas" class="alertas fixed-top">
    <div id="alerta" class="alert d-flex alert-secondary justify-content-center" role="alert">
        <span ></span>
    </div>
</div>
<script>
$().ready(function(){
    //ALMACENAMOS LOS MENSAJES RECIBIDOS DEL SERVIDOR Y LAS GUARDAMOS EN LOCAL STORAGE
    let mensajes = <?= ((isset($_GET['msg']))) ? $_GET['msg'] : "'empty'"; ?>;

    localStorage.setItem('ErrorMsgs', JSON.stringify(mensajes))
    
    //MOSTRAMOS LAS ALERTAS RECIBIDAS DEL SERVIDOR
    let mensajes1 = <?= ((isset($_GET['msga']))) ? $_GET['msga'] : "'empty'"; ?>;
    mensajes1 ? alertas(mensajes1) : '';

});
</script>