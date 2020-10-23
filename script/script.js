function link(link){
    window.location.href=link;
}
function checkForm(){
    let name=form.nickname.value;
    let select=form.nivel.value;
   if(name != '' && select != ''){
        return true;
    }else if(name == '' && select != ''){
        alertMsg("Coloque um Nickname");
        return false;
    }
    else if(select == '' && name != ''){
        alertMsg("Selecione um Nivel");
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