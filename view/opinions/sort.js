
const selectElement = document.querySelector('.state-select');

selectElement.addEventListener('change', (event) => {
    let state = document.getElementById("state-select");
    let strUser = state.options[state.selectedIndex].text;

    // javascript
    let elements = document.getElementsByClassName("test");

    document.write(names);
    switch(strUser) {
        default:
        case '--- Tous ----':
            // code block
            break;
        case 'En Modification':
            for(let i=0; i<elements.length; i++) {
                let value = elements[i].id.valueOf();
                if(value === "En Modification"){
                    elements[i].classList.add('none')
                }
                else {
                    false;
                }
            }
            break;
          case 'En revue':
            // code block
            break;
        case 'Nouveau':
            // code block
            break;
        case 'Obsolet':
            // code block
            break;
        case 'Publié':
            // code block
            break;
        case 'Rejeté':
            // code block
            break;
}
});