dropdown = document.getElementById("opinions-select");
stateColumn = document.getElementsByClassName("state-column")

dropdown.addEventListener("change", function () {
    if (this.value !== "---Tous---") {
        for (i = 0; i < stateColumn.length; i++) {
            if(stateColumn[i].dataset.state !== this.value) {
                stateColumn[i].parentElement.classList.add("d-none");
            } else {
                stateColumn[i].parentElement.classList.remove("d-none");
            }
        }
    }
    else {
        for (i = 0; i < stateColumn.length; i++) {
            stateColumn[i].parentElement.classList.remove("d-none");
        }
    }
});