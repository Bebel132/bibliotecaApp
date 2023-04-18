<?php
require("../php/connect.php");
echo "
<table class='tabela-registros'>
    <thead>
        <th>Nome Completo</th>
        <th>Data de Entrega</th>
    </thead>
    <tbody>";
$app->verLivroRegistros($conn, $_POST["id"]);
echo "
    </tbody>
</table>";
?>