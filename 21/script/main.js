const searchInput = document.getElementById("search-input");
const searchSubmit = document.getElementById("search-submit");
const tableContainer = document.getElementById("table__container");


searchInput.addEventListener('input', () => {
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if ( xhr.readyState == 4 && xhr.status == 200 ) {
            tableContainer.innerHTML = xhr.responseText;
        };
    };

    xhr.open("GET", `items.php?keyword=${searchInput.value}`, true);
    xhr.send();
})