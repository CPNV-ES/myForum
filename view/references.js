$(document).ready(function () {
    $('tr').mouseenter(function () {
        $(this).find('td:first-child').children('i').css({'visibility' : 'visible'});
    }).mouseleave(function () {
        $(this).find('td:first-child').children('i').css({'visibility' : 'hidden'});
    })
});