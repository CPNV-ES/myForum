/*
 * The following example will display user with the age set in the filter element
 * 
 * <select data-filter="users" data-filter-attr="data-filter-age">
 * 
 * <table id="users">
 *  <tr data-filter-age="18">
 *  <tr data-filter-age="45">
 *  ...
 *
*/

// All the elements that could be filtered
let dataFilters = document.querySelectorAll('[data-filter]');

for (dataFilter of dataFilters) {
    // The attribue of the filtered element
    let filterAttribute = dataFilter.getAttribute('data-filter-attr');
    // The element that contains elements to filter. This allows us to only 
    // search the elements from within a parent.
    let filterElement = dataFilter.getAttribute('data-filter');

    let table = document.getElementById(filterElement);
    // This are the elements we will be iterating to check against the dataFilter value
    let filterElements = table.querySelectorAll(`[${filterAttribute}]`);

    dataFilter.addEventListener('change', function () {
        if (this.value == 'all') {
            for (let element of filterElements) {
                element.classList.remove('d-none');
            }

            return;
        }

        for (let element of filterElements) {
            if (element.getAttribute(filterAttribute) == this.value) {
                element.classList.remove('d-none');
            } else {
                element.classList.add('d-none');
            }
        }
    });
}