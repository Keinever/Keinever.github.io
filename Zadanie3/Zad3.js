let row_number = 1;
const table = document.createElement('table');
const thead = document.createElement('thead');
const tbody = document.createElement('tbody');
let create_t = false
let DATA;

function getFile (fileName) {

    let request = new XMLHttpRequest();

    request.open('GET', fileName);

    request.onloadend = function() {

        parse(request.responseText);
    }

    request.send();
}

getFile('russian_names.json'); //путь к файлу

function parse(obj) {

    DATA = JSON.parse(obj);
}



function generator_id(){
    const abc = "0123456789";
    let rs = "";
    while (rs.length < 10) {
        rs += abc[Math.floor(Math.random() * abc.length)];
    }
    return rs;
}


function create_head(parent){
    let row_head = document.createElement('tr');
    let heading_1 = document.createElement('th');
    heading_1.innerHTML = "Number";
    let heading_2 = document.createElement('th');
    heading_2.innerHTML = "Name";
    let heading_3 = document.createElement('th');
    heading_3.innerHTML = "Id";
    row_head.appendChild(heading_1);
    row_head.appendChild(heading_2);
    row_head.appendChild(heading_3);
    parent.appendChild(row_head);
}


function create_row(parent){
    let row = document.createElement('tr');
    let row_data_1 = document.createElement('td');
    row_data_1.innerHTML = row_number;
    let row_data_2 = document.createElement('td');
    row_data_2.innerHTML = DATA[Math.floor(Math.random()*51529)]["Name"];
    let row_data_3 = document.createElement('td');
    row_data_3.innerHTML = generator_id();
    row.appendChild(row_data_1);
    row.appendChild(row_data_2);
    row.appendChild(row_data_3);
    row.id = row_number;
    row_number++;
    parent.appendChild(row);
}


function del_row (parent) {
    const form = document.getElementById("form1");
    const formData = new FormData(form);
    const id = formData.get("number");
    if (document.getElementById(id)){
        const row = document.getElementById(id);
        parent.removeChild(row);
    }
    else alert("Введите номер строки коректно!");
}


function crate_table() {
    if (!create_t) {
        create_head(thead);
        create_row(tbody);
        create_row(tbody);

        table.appendChild(thead);
        table.appendChild(tbody);

        document.getElementById('table0').appendChild(table);
        document.getElementById('add').removeAttribute("disabled");
        document.getElementById('del').removeAttribute("disabled");
         document.getElementById('number').removeAttribute("disabled");
        create_t = true;
    }
    else alert('Таблица уже создана');
}