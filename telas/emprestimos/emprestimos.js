$("#emprestimosSubmit").click(e => {
    e.preventDefault();
    let inputsE = document.querySelectorAll(".inputsE");
    let arr = [];
    let formData = new FormData();
    for(let i=0; i<inputsE.length; i++){
        if(!inputsE[i].disabled){
            if(inputsE[i].value.trim().length != 0){
                arr.push(inputsE[i].value);
                formData.append(inputsE[i].id, inputsE[i].value)
            } else {
                alert("preencha todos os campos obrigatórios");
                return;
            }
        }
    }

    if(arr.length > 0){
        $.ajax({
            url: "telas/emprestimos/emprestimoEscolha.php",
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
            url: "telas/emprestimos/apagarEmprestimo.php",
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