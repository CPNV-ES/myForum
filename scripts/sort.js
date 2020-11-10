document.getElementById("filter").addEventListener("click", onSelect);

function onSelect()
{

    const input = document.getElementById("filter");
    const inputStr = input.value.toUpperCase();
    if(input.value != "--Tout--"){
        document.querySelectorAll('#opinions tr:not(.header)').forEach((tr) => {
            const anyMatch = [...tr.children]
              .some(td => td.textContent.toUpperCase().includes(inputStr));
            if (anyMatch) tr.style.removeProperty('display');
            else tr.style.display = 'none';
          });
    }
    else{
        document.querySelectorAll('#opinions tr:not(.header)').forEach((tr) => {
            const anyMatch = [...tr.children]
              .some(td => td.textContent.toUpperCase().includes(inputStr));
            if (anyMatch) tr.style.removeProperty('display');
            else tr.style.display = '';
          });
    }

}
