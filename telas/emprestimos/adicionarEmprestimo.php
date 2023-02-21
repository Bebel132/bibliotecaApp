<?php
require("../php/connect.php");
$arr = [];
foreach($_POST as $i){
    array_push($arr, $i);
}
$app->adicionarEmprestimo($conn, $arr[0], $arr[1], $arr[2]);
echo "<script>
    mudarTela('telas/emprestimos/emprestimos.php')
</script>";
?>