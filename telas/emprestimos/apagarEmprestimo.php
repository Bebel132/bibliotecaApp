<?php
require("../php/connect.php");
$app->apagarEmprestimo($conn, $_POST["id"]);
echo "<script>
    mudarTela('telas/emprestimos/emprestimos.php')
</script>";
?>