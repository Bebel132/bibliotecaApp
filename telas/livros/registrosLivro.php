<?php
require("../php/connect.php");
?>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<div class="main-titulo">
    <h1><?php echo $_POST["nomeLivro"] ?></h1>
</div>
<button class="voltar">voltar</button>
<table id="tabela-registrosLivro">
    <thead>
        <tr>
            <th>nome</th>
            <th>estado</th>
            <th>data entrega</th>
        </tr>
    </thead>
<?php
    $app->verLivrosRegistros($conn, $_POST["id"])
?>
</table>
<script>
    btnVoltar = document.querySelector(".voltar");
    btnVoltar.addEventListener("click", () => {
        mudarTela("telas/livros/livros.php")
    })
</script>