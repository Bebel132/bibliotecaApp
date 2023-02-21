funcao = document.querySelector("#funcao");
turma = document.querySelector("#turma");
nomeResp = document.querySelector("#nomeResp");
telefoneResp = document.querySelector("#telefoneResp");
matricula = document.querySelector("#matricula");
funcao.addEventListener('change', () => {
    if(funcao.value != "aluno"){
        turma.disabled = true;
        nomeResp.disabled = true;
        telefoneResp.disabled = true;
    } else if (funcao.value == "aluno"){
        turma.disabled = false;
        nomeResp.disabled = false;
        telefoneResp.disabled = false;
    }
})

$("#usuariosSubmit").click(e => {
    e.preventDefault()
    let inputsU = document.querySelectorAll(".usuariosInput");
    let arr = [];
    let formData = new FormData();
    for(let i=0; i<inputsU.length; i++){
        if(!inputsU[i].disabled){
            if(inputsU[i].value.trim().length != 0){
                arr.push(inputsU[i].value);
                formData.append(inputsU[i].id, inputsU[i].value)
            } else {
                alert("preencha todos os campos obrigatórios");
                return;
            }
        }
    }

    if(arr.length > 0){
        $.ajax({
            url: "telas/usuarios/adicionarUsuario.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: (e) => {
                $(".main-container").html(e);
            }
        })
    }
})

btnApagar = document.querySelectorAll(".apagar");
btnApagar.forEach(e => {
    e.addEventListener("click", () => {
        let formData = new FormData();
        formData.append("id", e.parentNode.parentNode.children[0].textContent)
        $.ajax({
            url: "telas/usuarios/apagarUsuario.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: (e) => {
                $(".main-container").html(e);
            }
         })
    })
})