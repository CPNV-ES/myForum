document.getElementById("delete").addEventListener("click", onDelete);

function onDelete(evt) {

    var answer = window.confirm("Delete reference ?");
    if (!answer) {
        evt.preventDefault();
    }

}