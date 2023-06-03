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
        mudarTela("telas/livros/adicionarLivros.php", formData)
    }
});

btnApagar = document.querySelectorAll(".apagar");
btnApagar.forEach(e => {
    e.addEventListener("click", () => {
        let formData = new FormData();
        formData.append("id", e.parentNode.parentNode.children[0].textContent)
        mudarTela("telas/livros/apagarLivro.php", formData);
    })
})

btnInformacoes = document.querySelectorAll(".informacoes");
btnInformacoes.forEach(e => {
    e.addEventListener("click", () => {
        let formData = new FormData();
        formData.append("id", e.parentNode.parentNode.children[0].textContent)
        formData.append("nomeLivro", e.parentNode.parentNode.children[1].textContent)
        mudarTela("telas/livros/registrosLivro.php", formData);
    })
})