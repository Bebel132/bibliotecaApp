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

    bars.classList.toggle("fa-x")
})

function mudarTela(url){
    $.ajax({
        url: url,
        success: function (e) {
            $("main").children().hide();
            $("main").html(e);
        }
    })
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


