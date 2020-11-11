// JS code specific to the opinions list page
// Author: XCL
// Date Nov 20

selState.addEventListener('change', function () {
    val = selState.value
    divops = document.getElementsByClassName("divOp")
    for (i = 0; i < divops.length; i++) {
        if (val > 0) {
            if (divops[i].dataset.opstateid == val) {
                divops[i].classList.remove('d-none')
            } else {
                divops[i].classList.add('d-none')
            }
        } else {
            divops[i].classList.remove('d-none')
        }
    }
})
