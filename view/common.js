$( document ).ready(function() {
    $('.toast').toast('show');

    document.getElementById("filter").addEventListener("change", (event) => {
        filterRows(event.target.value);
    });
});


function filterRows(opinionStateId) {
    let rows = document.getElementsByClassName("opinion-row");
    for (var i = 0; i < rows.length; i++) {
        let e = rows[i];

        // opinion state -1 means "Display all"
        if(opinionStateId != -1 && e.dataset.state != opinionStateId) {
            e.style.display = "none";
        }
        else {
            e.style.display = "table-row";
        }
    }
}