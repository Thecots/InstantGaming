$('#login').click(function(){
    $('.login').css("display", "flex");
    $('.regsiter').css("display", "none");

});


$('#quit').click(function(){
    $('.login').css("display", "none");
    $('.regsiter').css("display", "none");

});

$('#CrearCuenta').click(function(){
    $('.regsiter').css("display", "block");
});

$('#conf-user').click(function(){
    if($('.conf-user').css('display') == 'none'){
        $('.conf-user').css("display", "block");
    }else{
        $('.conf-user').css("display", "none");
    }
});

$('.body').click(function(){
    $('.conf-user').css("display", "none");
});

$('#IniciarSession').click(function(){
    const postData = {
        user: $('#sumb_user').val(),
        passwd: $('#sumb_passwd').val(),
    };
    $.post('js/app/login.php',postData, function(response) {
        if(response == "login"){
            location.reload('../index.php');
        }else{
            $('.errorl').css("display", "block");
        }
    })

});

$('#IniciarSession2').click(function(){
    const postData = {
        user: $('#sumb_user').val(),
        passwd: $('#sumb_passwd').val(),
    };
    $.post('../js/app/login.php',postData, function(response) {
        if(response == "login"){
            location.reload('../index.php');
        }else{
            $('.errorl').css("display", "block");
        }
    })

});

$('#CerrarSession').click(function(){
    $.post('js/app/cerrar_session.php', function(response) {
        location.reload('../index.php');
    })

});

$('#CerrarSession2').click(function(){
    $.post('../js/app/cerrar_session.php', function(response) {
        location.reload('../index.php');
    })

});


$('#adminPanel').click(function(){
        location.reload('../dashboard.html');
});

$('#registrar').click(function(){
    const postData = {
        email: $('#r_email').val(),
        passwd1: $('#r_passwd1').val(),
        passwd2: $('#r_passwd2').val(),
        nombre: $('#r_nombre').val(),
        apellido: $('#r_apellido').val(),
        user: $('#r_user').val(),
        date: $('#r_date').val(),
    };
    $.post('js/app/register.php',postData, function(response) {
        if(response == 'great'){
            alert(response);
            $('#form_link').trigger('reset');
            $('.regsiter').css("display", "none");
            $('.login').css("display", "flex");
        }else{
            alert(response);

        }
    })

});

$('#registrar2').click(function(){
    const postData = {
        email: $('#r_email').val(),
        passwd1: $('#r_passwd1').val(),
        passwd2: $('#r_passwd2').val(),
        nombre: $('#r_nombre').val(),
        apellido: $('#r_apellido').val(),
        user: $('#r_user').val(),
        date: $('#r_date').val(),
    };
    $.post('../js/app/register.php',postData, function(response) {
        if(response == 'great'){
            alert(response);
            $('#form_link').trigger('reset');
            $('.regsiter').css("display", "none");
            $('.login').css("display", "flex");

        }else{
            alert(response);

        }
    })

});