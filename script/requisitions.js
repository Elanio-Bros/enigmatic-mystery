function list() {
    //function to list the ranking when the page loads
    requestAjaxListRaking();
}

function insertOnList(database) {
    //function to get data from an array and then put it in the list table
    database.forEach(function (value, index) {
        let listas = document.getElementById('list');
        let linha = listas.insertRow();
        let linha1 = linha.insertCell();
        linha1.innerHTML = (index + 1) + 'º';
        (index + 1 == 1 || index + 1 == 2 || index + 1 == 3) ? linha1.setAttribute('name', index + 1): linha1.setAttribute('name', 'num');
        linha.insertCell(1).innerHTML = value['nickname'];
        linha.insertCell(2).innerHTML = levelConvert(value['nivel']);
        linha.insertCell(3).innerHTML = (value['fase'] == 0) ? ("Completou") : (value['fase']);
        linha.insertCell(4).innerHTML = value['pontos'] + ' pontos';
    });
}

function requestAjaxListRaking() {
    //function for when the page is loaded it pulls data via ajax and passes to the insertList function
    ajax = new XMLHttpRequest();
    ajax.open('POST', `raking_query.php`);
    ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            insertOnList(JSON.parse(ajax.responseText));
        }
    }
    ajax.send();
}

function removeOnList() {
    //function to get data from an array and then put it in the list table
    var table = document.getElementById('list');
    for (var i = table.rows.length - 1; i >= 0; i--) {
        table.deleteRow(i);
    }
}

function levelConvert(num) {
    //function to convert numbers to text for levels
    switch (num) {
        case 1:
            return '&#128512; Muito Fácil';
        case 2:
            return '&#128513; Fácil';
        case 3:
            return '&#128523; Médio';
        case 4:
            return '&#128526; Difícil'
        case 5:
            return '&#128545; Muito Difícil'
        default:
            return 'erro';
    }
}

function respostaToggle() {
    let resposta = document.getElementById('resposta').style.display;
    if (resposta == "none") {
        document.getElementById('resposta').style.display = 'flex';
    } else {
        document.getElementById('resposta').style.display = 'none';
    }
}