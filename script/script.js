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

function teste(num){
    if(num==1){
        document.getElementById('radioR').style.borderColor='white';
        document.getElementById('radioPR').style.borderColor='blue';
        document.getElementsByName('tipo')[0].checked=true;
    }else if(num==2){
        document.getElementById('radioPR').style.borderColor='white';
        document.getElementById('radioR').style.borderColor='blue';
        document.getElementsByName('tipo')[1].checked=true;
    }
}