$(document).ready(function () {
    $('tr').mouseenter(function () {
        $(this).find('span').removeClass('hidden-element');
    }).mouseleave(function () {
        $(this).find('span').addClass('hidden-element');
    })
});