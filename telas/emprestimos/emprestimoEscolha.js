selUsuario = document.querySelectorAll(".selUsuario");
usuarioSelecionado = "";
selUsuario.forEach(e => {
    e.addEventListener("click", () => {
        usuarioSelecionado = e;
        selUsuario.forEach(i => {
            if(i != usuarioSelecionado){
                i.disabled = true;
            }
        })
        usuarioSelecionado.style.backgroundColor = "#ffffff";
        usuarioSelecionado.style.color = "#292ccc";
        usuarioSelecionado = usuarioSelecionado.parentNode.parentNode.children[0].textContent;
    })
})

selLivro = document.querySelectorAll(".selLivro");
livroSelecionado = "";
selLivro.forEach(e => {
    e.addEventListener("click", () => {
        livroSelecionado = e;
        selLivro.forEach(i => {
            if(i != livroSelecionado){
                i.disabled = true;
            }
        })
        livroSelecionado.style.backgroundColor = "#ffffff";
        livroSelecionado.style.color = "#292ccc";
        livroSelecionado = livroSelecionado.parentNode.parentNode.children[0].textContent;
    })
})

$(".enviar").click(e => {
    e.preventDefault();
    let formData = new FormData();
    formData.append("idUsuario", usuarioSelecionado);
    formData.append("idLivro", livroSelecionado);
    formData.append("dataEntrega", dataEntrega);

    $.ajax({
        url: "telas/emprestimos/adicionarEmprestimo.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: (e) => {
            $(".main-container").html(e);
        }
    })
})