function searchNames(name) {
    fetch('searchData.php', {
        method: 'POST',
        body: new URLSearchParams('name=' + name)
    }).then(function(res) {
        return res.json();
    }).then(function (data){
        populateTable(data);
    }).catch(function (e) {
        console.log(e);
    })
}

function populateTable(data){
    table = document.querySelector(".data-table");

    table.innerHTML = "";

    for(let i = 0; i < data.length; i++) {
        const trDataContainer = document.createElement("tr");
        table.appendChild(trDataContainer);

        let newId = document.createElement("td");
        newId.innerHTML = data[i]["id"];
        trDataContainer.appendChild(newId);

        let newName = document.createElement("td");
        newId.innerHTML = data[i]["name"];
        trDataContainer.appendChild(newName);
    }
}