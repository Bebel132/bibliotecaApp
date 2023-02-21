<?php
require("../php/connect.php");
$arr = [];
foreach($_POST as $key){
    array_push($arr, $key);
}

if(sizeof($arr) == 3){
    $app->adicionarUsuario($conn, sizeof($arr), $arr[0], $arr[1], $arr[2]);
} else {
    $app->adicionarUsuario($conn, sizeof($arr), $arr[0], $arr[1], $arr[3], $arr[2], $arr[4], $arr[5]);
}

echo "<script>
    mudarTela('telas/usuarios/usuarios.php')
</script>";
?>