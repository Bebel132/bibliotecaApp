<?php
require("../php/connect.php");
$app->apagarLivro($conn, $_POST["id"]);
echo "<script>
    mudarTela('telas/livros/livros.php')
</script>";
?>