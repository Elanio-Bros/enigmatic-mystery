function link(link){
    window.location.href=link;
}
function checkForm(){
    let name= form.nickname.value;
    let select= form.nivel.value;
    let radio= form.tipo.value;
    if(name != '' && select != '' && radio!=''){
        return true;
    }
    else if(name == '' && select != '' && radio!=''){
        alertMsg("Coloque um Nickname");
        return false;
    }
    else if(select == '' && name != '' && radio!=''){
        alertMsg("Selecione um Nivel");
        return false;
    }
    else if(radio=='' && name != '' && select!= ''){
        alertMsg("Selecione o Tipo");
        return false;
    }
    else{
        alertMsg("Colque as Informações nos Campos");
        return false;
    }
}
function alertMsg(msg){
    document.getElementById("alert").style.display="flex";
    document.getElementById("msg").innerHTML=msg;
    setTimeout(() => {document.getElementById("alert").style.display="none"; }, 5000);
}
function x(){
    document.getElementById("alert").style.display="none";
}

function toogleRadio(num){
    const noselect='white';
    if(num==0){
        document.getElementById('radioR').style.borderColor=noselect;
        document.getElementById('radioPR').style.borderColor='blue';
        document.getElementsByName('tipo')[0].checked=true;
    }else if(num==1){
        document.getElementById('radioPR').style.borderColor=noselect;
        document.getElementById('radioR').style.borderColor='red';
        document.getElementsByName('tipo')[1].checked=true;
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
function typeConvert(num) {
    //function to convert numbers to text for levels
    switch (num) {
        case 'PR':
            return 'Perguntas';
        case 'RT':
            return 'Roteiro';
        default:
            return 'erro';
    }
}