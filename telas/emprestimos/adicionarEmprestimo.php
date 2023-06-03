<?php
require("../php/connect.php");
$arr = [];
$app->adicionarEmprestimo($conn, $_POST['idUsuario'], $_POST['idLivro'], $_POST['dataEntrega']);
echo "<script>
    mudarTela('telas/emprestimos/emprestimos.php')
</script>";foreach($_POST as $i){
    array_push($arr, $i);
}
?>