$(function(){
    getimg();
    getcorreo();
    getname();
});

$('#fp-show').click(function(){
    $('.fp-show').css("display", "flex");
    $('.fp-first').css("display", "none");

});

$('#img-cancel').click(function(){
    $('.fp-show').css("display", "none");
    $('.fp-first').css("display", "flex");

});

$('#upload-img').click(function(){
    $('.fp-show').css("display", "none");
    $('.fp-first').css("display", "flex");

});



$('#aceptar-correo').click(function(e){
    $('#error1').css("display", "none");
    $('#error2').css("display", "none");
    $('#error3').css("display", "none");
    $('#p-c').css("display", "none");

    const postData = {
        correo1: $('#correo1').val(),
        passwd: $('#passwd1').val()
    };
    $.post('editar/correo.php',postData, function(response) {
        if(response == 'error1'){
            $('#error1').css("display", "block");
        }else if(response == 'error2'){
            $('#error2').css("display", "block");

        }else if(response == 'error3'){
            $('#error3').css("display", "block");
        }else{
            $('#p-c1').css("display", "block");
            $('#correo1').val(''),
            $('#correo2').val(''),
            $('#passwd1').val(''),
            getcorreo();

        }
    })

});

$('#aceptar-nombre').click(function(e){
    $('#error13').css("display", "none");
    $('#error23').css("display", "none");
    $('#error33').css("display", "none");
    $('#p-c13').css("display", "none");

    const postData = {
        nombre: $('#nombre3').val(),
        apellido: $('#apellido3').val(),
        passwd: $('#passwd3').val()
    };
    $.post('editar/nombre.php',postData, function(response) {
        if(response == 'error1'){
            $('#error13').css("display", "block");
        }else if(response == 'error2'){
            $('#error23').css("display", "block");

        }else if(response == 'error3'){
            $('#error33').css("display", "block");
        }else{
            $('#p-c13').css("display", "block");
            $('#nombre3').val(''),
            $('#apellido3').val(''),
            $('#passwd3').val(''),
            getname();

        }
    })

});

function getcorreo(){
    $.ajax({
        url: 'editar/getcorreo.php',
        type: 'GET',
        success: function (response){
            console.log(response);
            let tasks = JSON.parse(response);
            let template = '';
            tasks.forEach(task =>{
                template +=
                `
                ${task.correo}
                `
            });
            $('.correoa').html(template);
        }
    })
};

function getimg(){
    $.ajax({
        url: 'editar/getimg.php',
        type: 'GET',
        success: function (response){
            console.log(response);
            let tasks = JSON.parse(response);
            let template = '';
            tasks.forEach(task =>{
                template +=
                `
                    <img src="../${task.img}" alt="">
                `
            });
            $('.getimg').html(template);
        }
    })
};


function getname(){
    $.ajax({
        url: 'editar/getname.php',
        type: 'GET',
        success: function (response){
            console.log(response);
            let tasks = JSON.parse(response);
            let template = '';
            tasks.forEach(task =>{
                template +=
                `
                ${task.name}
                `
            });
            $('.getname').html(template);
        }
    })
};

$('#aceptar-passwd').click(function(e){
    $('#error12').css("display", "none");
    $('#error22').css("display", "none");
    $('#error32').css("display", "none");
    $('#p-c12').css("display", "none");

    const postData = {
        p1: $('#p12').val(),
        p2: $('#p22').val(),
        p3: $('#p32').val()
    };
    $.post('editar/passwd.php',postData, function(response) {
        if(response == 'error1'){
            $('#error12').css("display", "block");
        }else if(response == 'error2'){
            $('#error22').css("display", "block");

        }else if(response == 'error3'){
            $('#error32').css("display", "block");
        }else{
            $('#p-c12').css("display", "block");
            $('#p12').val(''),
            $('#p22').val(''),
            $('#p32').val(''),

            getname();

        }
    })

});