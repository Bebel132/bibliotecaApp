 <head>
    <script src="https://kit.fontawesome.com/4b1186e948.js" crossorigin="anonymous"></script>
</head>
<div class="main-container emprestimos-container">
    <div class="main-titulo">
        <h1>Empréstimos</h1>
    </div>
    <div class="mainContent">
        <div class="main-tabela">
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>locador</th>
                        <th>livro</th>
                        <th>função</th>
                        <th>turma</th>
                        <th>data de entrega</th>
                        <th>telefone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require("../php/connect.php");
                    $app->verEmprestimos($conn);
                    ?>
                </tbody>
            </table>
        </div>
        <div class="main-formulario">
            <form action="">
                <div class="formCampo">
                    <label for="locador">locador:</label>
                    <input type="text" name="locador" id="locador" class="inputsE">
                </div>
                <div class="formCampo">
                    <label for="livro">livro:</label>
                    <input type="text" name="livro" id="livro" class="inputsE">
                </div>
                <div class="formCampo">
                    <label for="dataEntrega">data de entrega:</label>
                    <input type="date" name="dataEntrega" id="dataEntrega" class="inputsE">
                </div>
                <input type="submit" value="enviar" id="emprestimosSubmit">
            </form>
        </div>
    </div>
</div>
<script src="telas/emprestimos/emprestimos.js"></script>