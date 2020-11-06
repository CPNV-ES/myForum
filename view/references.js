$(document).ready(function () {
    $('tr').mouseenter(function () {
        $(this).find('span').css({'visibility' : 'visible'});
    }).mouseleave(function () {
        $(this).find('span').css({'visibility' : 'hidden'});
    })
});