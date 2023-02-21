<?php
require("../php/connect.php");
$arr = [];
foreach($_POST as $i){
    array_push($arr, $i);
}
$app->adicionarLivro($conn, $arr[0], $arr[1], $arr[2], $arr[3], $arr[6], $arr[4], $arr[5]);
echo "<script>
    mudarTela('telas/livros/livros.php')
</script>";
?>