$("#livrosSubmit").click(e => {
    e.preventDefault();
    let inputsL = document.querySelectorAll(".livroInput");
    let arr = [];
    let formData = new FormData();
    for(let i=0; i<inputsL.length; i++){
        if(inputsL[i].value.trim().length != 0){
            arr.push(inputsL[i].value)
            formData.append(inputsL[i].id, inputsL[i].value)
        } else {
            alert("preencha todos os campos");
            return;
        }
    }

    if(arr.length != 0){
        $.ajax({
            url: "telas/livros/adicionarLivros.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: (e) => {
                $(".main-container").html(e);
            }
        })
    }
});
