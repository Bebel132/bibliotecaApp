<?php
require("../php/connect.php");
echo "  <script>
            dataEntrega = '".$_POST["dataEntrega"]."';
        </script>";
?>
<div class="escolha-tables">
    <table>
        <thead>
            <th>id</th>
            <th>nome</th>
            <th>funcao</th>
            <th>turma</th>
            <th>telefone</th>
            <th>nome responsável</th>
            <th>telefone responsável</th>
        </thead>
        <tbody>
            <?php
            $app->verUsuarios($conn, "especificos", $_POST["locador"]);
            ?>
        </tbody>
    </table>
    
    
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>livro</th>
                <th>autor</th>
                <th>edição</th>
                <th>gênero</th>
                <th>editora</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $app->verLivros($conn, "especificos", $_POST["livro"]);
            ?>
        </tbody>
    </table>
    <button class="enviar">enviar</button>
</div>
<script src="telas/emprestimos/emprestimoEscolha.js"></script>