<?php
require("../php/connect.php");
$app->apagarUsuario($conn, $_POST["id"]);
echo "<script>
    mudarTela('telas/usuarios/usuarios.php')
</script>";
?>