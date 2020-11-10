// Sort Opinions by states
$( ".sort-opinion-state" ).on( "click", function() {
    if ($( this ).text().toLowerCase() == "---tous---".toLowerCase()){
        $(".opinion-state").parent().show();
    }
    else{
        $(".opinion-state:contains(" + $( this ).text() + ")").parent().show();
        $(".opinion-state:not(:contains(" + $( this ).text() + "))").parent().hide();
    }
});
