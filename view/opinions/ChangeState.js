$("#OpinionState").on("change", function(){
    // This code will fire every time the user selects something

    select = document.getElementById("OpinionState")
    choice = select.selectedIndex

    var valeur_cherchee = select.options[choice].value
    all_value = document.querySelector('select')

    //id = document.getElementById(valeur_cherchee)

    //id.style.display = 'none'
    var i;
    var y;

    if(valeur_cherchee === "--- Tous ---"){
        AllShow()
    }else
    {
        AllShow()

        for (i = 0; i < all_value.length; i++) {
            var value_hidden = all_value.options[i].value

            if (value_hidden !== valeur_cherchee) {
                list = document.querySelectorAll("#" + all_value.options[i].value);
                for (y = 0; y < list.length; y++) {
                    list[y].style.display = "none"
                }
            }
        }
    }
    //prompt(all_value.options[2].text)


})

function AllShow(){
    for(i=0; i< all_value.length;i++){
        var value_Show = all_value.options[i].value
        list = document.querySelectorAll("#"+all_value.options[i].value);
        for (y = 0; y < list.length; y++) {
            list[y].style.display = "flex"
        }
    }
}