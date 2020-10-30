$(document).ready(function () {
    $('td').find('a').mouseenter(function () {
        $(this).parent().parent().first().css({'background-color': 'red'})
    })
});