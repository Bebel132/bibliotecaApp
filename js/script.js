menuX = document.querySelector(".menu-xContainer");
bars = document.querySelector(".fa-bars");
menu = document.querySelector(".menu");
menuItemText = document.querySelectorAll(".menu_item-text");
menuX.addEventListener("click", () => {
    menu.classList.toggle("fechado")
    menu.classList.toggle("aberto")

    menuItemText.forEach(e => {
        e.classList.toggle("textShow");
    })

    document.querySelector(".sair").classList.toggle("textShow");

    bars.classList.toggle("fa-x")
})

function mudarTela(url, formData = null){
    if(!formData){
        $.ajax({
            url: url,
            success: function (e) {
                $("main").children().hide();
                $("main").html(e);
            }
        })
    } else {
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: (e) => {
                $(".main-container").html(e);
            }
        })
    }
    
}

$(".usuarios").click(() => {
    mudarTela("telas/usuarios/usuarios.php")
})

$(".emprestimos").click(() => {
    mudarTela("telas/emprestimos/emprestimos.php")
})

$(".livros").click(() => {
    mudarTela("telas/livros/livros.php")
})


