// JS code specific to the reference list page
// Author: XCL
// Date Oct 20

titles = document.getElementsByClassName("divtitle")
for (i = 0; i < titles.length; i++) {
    titles[i].addEventListener('mouseover', function() {
        document.getElementById('divIcons'+this.dataset.id).classList.remove('d-none')
    })
    titles[i].addEventListener('mouseout', function() {
        document.getElementById('divIcons'+this.dataset.id).classList.add('d-none')
    })
}
