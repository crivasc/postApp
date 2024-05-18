$().ready(function () {

    let config = {} //Configuración para mensajes de validación
    
    /*VALIDACIONES*/
    function userMessages(){
        //Accedemos a los mensajes en storage si existen
        let mensajes = JSON.parse(localStorage.getItem('ErrorMsgs'));

        //Si el servidor no ha enviado mensajes, mostramos mensajes default
        mensajes == 'empty' ? 
            config={
                userMsg:'El campo usuario es obligatorio',
                mailMsg:'El campo correo es obligatorio',
                passMsg:'El campo email es obligatorio'
            } : 
            config={ //Caso contrario, mostramos los mensajes desde el servidor
                userMsg:mensajes.user,
                mailMsg:mensajes.email,
                passMsg:mensajes.password
            };
        //Borramos los mensajes del storage
        localStorage.removeItem('ErrorMsgs');
    }
    userMessages();

/*validación para formularios de registro y login*/
/* configuración de validate.js*/
    $('#user-form').validate({
        errorElement: "em",
        errorPlacement: function (error, element) {
            error.addClass("alert alert-danger");
            error.insertAfter(element);
        },
        highlight: function (element) {
            $(element).parents(".block").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function (element) {
            $(element).parents(".block").addClass("has-success").removeClass("has-error");
        },
        messages:{
            txtuser:{
                required:config.userMsg
            },
            txtemail:{
                required:config.mailMsg,
                email:'El formato de email debe ser tucorreo@tucorreo.tls'
            },
            txtpass:{
                required:config.passMsg
            }
        }
    });/*FIN VALIDACIONES*/

    /*VER PASSWORD*/
    $('#showpass').click(function(){
        if($(this).hasClass('icofont-eye-blocked')){
            $('#txtpass').attr('type','text');
            $(this).removeClass('icofont-eye-blocked').addClass('icofont-eye');
        }else{
            $('#txtpass').attr('type','password');
            $(this).removeClass('icofont-eye').addClass('icofont-eye-blocked');
        }
    });/* FIN VER PASSWORD */

});

