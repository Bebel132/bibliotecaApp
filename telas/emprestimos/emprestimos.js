$("#emprestimosSubmit").click(e => {
    e.preventDefault();
    let inputsE = document.querySelectorAll(".inputsE");
    let arr = [];
    let formData = new FormData();
    for(e of inputsE){
        if(e.value.trim() == ""){
            alert("preencha todos os campos!");
            return;
        } else {
            arr.push(e)
        }
    }

    arr.forEach(e => {
        formData.append(e.id, e.value)
    })

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