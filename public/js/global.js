/*BLOQUE DE ALERTAS*/
function alertas(info){
    var msg = info;
    if(msg.error){
        $('#alertas').removeClass('overflow-hidden minimal');
        $('#alerta').removeClass('alert-success' || 'alert-danger' && 'visually-hidden').addClass('alert-warning animate__animated animate__fadeInDown');
        $('#alerta').html('<i class="icofont-exclamation-tringle fs-3 me-3"></i><span>'+info.error+'</span>');
    }
    if(msg.exito){
        $('#alertas').removeClass('overflow-hidden minimal');
        $('#alerta').removeClass('alert-warning' || 'alert-danger' && 'visually-hidden').addClass('alert-success animate__animated animate__fadeInDown');
        $('#alerta').html('<i class="icofont-exclamation-tringle fs-3 me-3"></i><span>'+info.exito+'</span>');
    }
    if(msg == 'empty'){
        $('#alertas').removeClass('overflow-hidden minimal');
        $('#alerta').addClass('visually-hidden')
    }
    setTimeout(() => {
        $('#alerta').removeClass('animate__fadeInDown').addClass('animate__fadeOutUp');
        $('#alerta span').addClass('animate__animated animate__fadeOut').html('');
        msg = 'empty';
    }, 3000);
    setTimeout(() => {
        $('#alertas').addClass('overflow-hidden minimal');
    }, 3500);
}/*FIN ALERTAS*/

/*AVATAR*/
function Avatarz(data){
    let avatarData = data.substr(0,1);
    $('#avatar').html('<span>'+avatarData+'</span>');

    //Colores aleatorios del avatar
    var bgs = [
        "bg1",
        "bg2",
        "bg3",
        "bg4",
        "bg5",
        "bg6"
    ];
    var rand = bgs[Math.floor(Math.random() * bgs.length)];
    $('#avatar').addClass(rand);
    $('#avatar').addClass('border rounded-circle');
}/*FIN AVATAR */

/*LANZADOR DE CKEDITOR*/ 
function editor(obj){
    let CKEDITOR=[]
    var go = '';
    if(obj){
        go = obj;
        ClassicEditor
        .create( document.querySelector( go ),{
            toolbar: {
                items: [
                    'undo', 'redo',
                    '|', 'heading',
                    '|', 'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor',
                    '|', 'bold', 'italic', 'strikethrough', 'subscript', 'superscript',
                    '|', 'link', 'uploadImage', 'blockQuote', 'codeBlock',
                    '|', 'bulletedList', 'numberedList', 'todoList', 'outdent', 'indent'
                ],
                shouldNotGroupWhenFull: false
            }
        } )
        .then(editor=>{
            CKEDITOR[go] = editor;
        })

        $("post-form").on('submit', function(e){
            e.preventDefault();
            setTimeout(() => {
                CKEDITOR[go].destroy();
            }, 1000);
        });
        $(".cancelpost").on('click',function(){
            setTimeout(() => {
                CKEDITOR[go].destroy();
            }, 1000);
        });
    }
}
/*remover instancia de ckeditor*/
$(".cancelpost").on('click',function(e){
    if('#post-form .ck-editor'){
        $('.ck-editor').remove();
    }
});/*FIN CKEDITOR*/

/* BLOQUE DE CAJA MODAL (estilo colorbox) */ 
$('.boxcontainer').addClass('visually-hidden');

function actions(e){
    if($('#thebox').hasClass('visually-hidden')){
        $('#thebox').removeClass('visually-hidden animate__fadeOut').addClass('animate__fadeIn');
    }else{
        $('#thebox').removeClass('animate__fadeIn').addClass('animate__fadeOut');
        setTimeout(() => {
            $('#thebox').addClass('visually-hidden');
            $('.boxcontainer').addClass('visually-hidden');
        }, 500);
        
        cleaner();
    }
    
}
function veroff(obj){
    if($(obj)){
        $(obj).removeClass('visually-hidden');
        actions();
    }
}
/* control de caja modal */
function ejecutar(obj){
    switch (obj) {
        case '.box1':
            veroff(obj);
            break;
        case '.box2':
            veroff(obj);
            break;
        case '.box3':
            veroff(obj);
            break;
        case '.box4':
            veroff(obj);
            break;
        default:
            '.closer'
            break;
    }
}
$('.modalCloser').on('click',actions);
$('#avatar').on('click',function(e){
    ejecutar('.box1')
})/*FIN DE CAJA MODAL*/

/* CONTROL MODAL PARA POSTS */
function cleaner(){
    $('.postitems .postitle').text('');
    $('.postitems .postcont').html('');
    $('.postitems .postdate').text('');
    $('.postitems .postupdate').text('');
}

$('#novo').on('click',function(e){
    ejecutar('.box2')
    editor('#txtcont');
})
$('.verPost').on('click',function(e){
    var key = $(this).attr('item');
    var data = JSON.parse(key);

    $('#verActions .postitle').text(data.titulo);
    $('#verActions .postcont').html(data.contenido);
    $('#verActions .postdate').text(data.fecha);
    $('#verActions .postupdate').text(data.updated);
    ejecutar('.box3')
})
$('.editPost').on('click',function(e){
    var key = '';
    var key = $(this).attr('item');
    var data = JSON.parse(key);
    $('#editActions').find('input[name="txtid"]').val(data.uid);
    $('#editActions').find('input[name="txtitulo"]').val(data.titulo);
    $('#editActions').find('textarea[name="txtcont"]').val(data.contenido);
    ejecutar('.box4')
    if($('#editActions').find('textarea[name="txtcont"]').val()){
        editor('#txtcont1');
    }
    
});/* FIN CONTROL MODAL PARA POSTS */

/*EFECTO VISUAL PARA BOTON NUEVO POST*/
$('#novo').hover(function(){
    if($(this).hasClass('col-1')){
        $(this).removeClass('col-1').addClass('col-2');
        $('.tip').removeClass('animate__fadeOut').addClass('animate__fadeInLeft'); 
        setTimeout(() => {
            $('.tip').removeClass('visually-hidden'); 
        }, 50);
    }else{
        $(this).removeClass('col-2').addClass('col-1');
        $('.tip').removeClass('animate__fadeInLeft').addClass('animate__fadeOut'); 
        setTimeout(() => {
            $('.tip').addClass('visually-hidden'); 
        }, 100);
    }
});/* FIN EFECTO NUEVO POST */

/* ORDENAR POSTS POR FECHA */
function sort() {
    var tbody = $('#listado > tbody');

    tbody.find('tr').sort(function(a, b) {
        var dateA = new Date($(a).find('td:nth-child(3)').text())
        var dateB = new Date($(b).find('td:nth-child(3)').text())

        if (asc) {
            return dateA - dateB;
        } else {
            return dateB - dateA;
        }

    }).appendTo(tbody);
}

var asc = false;

$('#sort').on('click', function(){
    if (asc) {
        asc = false;
        $('.ordmsg').text('asc');
    } else {
        asc = true
        $('.ordmsg').text('desc');
    }
    sort(asc);
});/* FIN FUNCION PARA ORDENAR POR FECHA */
