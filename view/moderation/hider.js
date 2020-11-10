
function HideContent(){
    //Get all elements that classes names match with the selected value list     
    var test = document.getElementsByClassName(document.getElementById('states').value);

    //Hide them
    for(var i = 0; i < test.length; i++){
        test[i].style.display = "none";
    }
}

//Normaly we should use this class, we it actually in works in progress
function HideContent_debug(){
    //Set items into the list
    var items = ["Censuré", "Clos", "En discussion", "Proposé", "Publié"];

    //Parse the list
    for(var i = 0; i < items.length; i++){
        //If the item is equal to the selected item
        if (items[i] == document.getElementById('states').value)
        {
            //Display it
            //console.log(items[i]);
            console.log(items[i]);

        }else{
            //hide the rest of the content
            for(var i2 = 0; i2 < test.length; i2++){
                test[i].style.display = "none";
            }
        }
        //var content = document.getElementsByClassName(document.getElementById(i).value);
    }
}
