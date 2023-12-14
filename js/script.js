//Aplicar uma máscara de telefone
function mascaraTelefone(event) {
    let campo = event.target;
    //Remove todos os caracteres não numéricos
    let valor = campo.value.replace(/\D/g, "");

    //(xx) xxxx-xxxx - telefone fixo 
    //(xx) xxxxx-xxxx - celular
    //valor=16985654123
    //(16)98565-4123

    //Verificar quantos caracteres existem no campo telefone
    if (valor.length === 10 || valor.length === 11) {
        //Formato: (99) 99999-9999
        if (valor.length === 11) {
            campo.value = "(" + valor.substring(0, 2) + ")" +
                valor.substring(2, 7) + "-"
                + valor.substring(7, 11);
            //Formato: (99)9999-9999
        } else if (valor.length === 10) {
            campo.value = "(" + valor.substring(0, 2) + ")" +
                valor.substring(2, 6) + "-"
                + valor.substring(6, 10);
        }
        //Remove a mensagem de erro
        document.getElementById("erro-telefone").textContent = "";
    } else {
        if (valor.length === 0) {
            document.getElementById("erro-telefone").textContent = "";
        } else {
            //Exibe a mensagem de erro
            document.getElementById("erro-telefone").textContent = "Formato de telefone inválido!";
        }
    }
}

function mascaraNome(event) {
    let campo = event.target;
    let valor = campo.value.toLowerCase();
    let regex = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ'\s]+$/;

    if (regex.test(valor) || valor.length === 0) {
        document.getElementById("erro-nome").textContent = "";
    } else {
        document.getElementById("erro-nome").textContent = "Nome inválido. Apenas letras!";
    }
}

function mascaraEmail(event) {
    let campo = event.target;
    let valor = campo.value;
    let regex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

    if (regex.test(valor) || valor.length === 0) {
        document.getElementById("erro-email").textContent = "";
    } else {
        document.getElementById("erro-email").textContent = "E-mail inválido!";
    }
}

function verificarCampos(event){
    let email = document.getElementById("erro-email").innerText;
    let nome = document.getElementById("erro-nome").innerText;
    let telefone = document.getElementById("erro-telefone").innerText;
    let enviar = document.getElementById("enviar");
    
    if(email.trim()==="" && nome.trim()==="" && telefone.trim()===""){
        enviar.disabled=false;
        enviar.style.opacity=1;
    }else{
        enviar.disabled=true;
        enviar.style.opacity=0.5;
    }
}

document.getElementById("email").addEventListener("input", mascaraEmail);
document.getElementById("nome").addEventListener("input", mascaraNome);
document.getElementById("telefone").addEventListener("input", mascaraTelefone);
document.addEventListener("click", verificarCampos);

