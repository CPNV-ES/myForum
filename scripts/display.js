document.getElementById("delete").addEventListener("click", onDelete);

function onDelete(evt) {

    var answer = window.confirm("Save data?");
    if (!answer) {
        evt.preventDefault();
    }

}