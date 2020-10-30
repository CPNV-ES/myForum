$( "tr td" ).on( "mouseenter", function() {
  $(this).parent().addClass("teal lighten-3");
  $(this).parent().find( "a" ).removeClass("d-none");
});
$( "tr td" ).on( "mouseleave", function() {
  $(this).parent().removeClass("teal lighten-3");
  $(this).parent().find( "a" ).addClass("d-none");
});
console.log("test");
