$(function(){
    count();
});



function count(){
    $('#count1').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 1500,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    $('#count2').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 1500,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    $('#count3').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 1500,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    $('#count4').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 1500,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    $('#count5').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 1500,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
}





  $('#exit').click(function(){
    $('.body').animate({padding: "10px 10px 10px 60px"});

    $(".menu").animate({width: '50px'});

        $('.menu div p').css("display", "none");
        $('#exit').css("display", "none");
        $('#menu').css("display", "block");
        $('#home').css("margin-top", "25px");



});


$('#menu').click(function(){
    $('.body').animate({padding: "10px 10px 10px 260px"});

    $(".menu").animate({width: '250px'});
    $('.menu div p').css("display", "block");
    $('#exit').css("display", "block");
    $('#menu').css("display", "none");
    $('#home').css("margin-top", "0px");
    $('.body').css("padding-left", "260px");



});

$('#home').click(function(){
    $('.dasboard').css("display", "block");
    
    $('.usuarios').css("display", "none");
    $('.games').css("display", "none");
    $('.historial').css("display", "none");
    count();
});

$('#games').click(function(){
    $('.games').css("display", "block");
    
    $('.dasboard').css("display", "none");
    $('.usuarios').css("display", "none");
    $('.historial').css("display", "none");
});

$('#users').click(function(){
    $('.usuarios').css("display", "block");

    $('.dasboard').css("display", "none");
    $('.games').css("display", "none");
    $('.historial').css("display", "none");
});

$('#historial').click(function(){
    $('.historial').css("display", "block");

    $('.dasboard').css("display", "none");
    $('.usuarios').css("display", "none");
    $('.games').css("display", "none");

});