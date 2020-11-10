
function HideContent(){
    //Get all elements that classes names match with the selected value list     
    var test = document.getElementsByClassName(document.getElementById('states').value);

    //Hide them
    for(var i = 0; i < test.length; i++){
        test[i].style.display = "none";
    }
}
