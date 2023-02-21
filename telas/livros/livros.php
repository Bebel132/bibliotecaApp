<head>
    <script src="https://kit.fontawesome.com/4b1186e948.js" crossorigin="anonymous"></script>
</head>
<div class="main-container livros-container">
    <div class="main-titulo">
        <h1>Livros</h1>
    </div>
    <div class="mainContent">
        <div class="main-tabela">
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
                    require("../php/connect.php");
                    $app->verLivros($conn, "todos");
                    ?>
                </tbody>
            </table>
        </div>
        <div class="main-formulario">
            <form action="">
                <div class="formCampo">
                    <label for="titulo">titulo:</label>
                    <input type="text" name="titulo" id="titulo" class="livroInput" required>
                </div>
                <div class="formCampo">
                    <label for="autor">autor:</label>
                    <input type="text" name="autor" id="autor" class="livroInput" required>
                </div>
                <div class="formCampo">
                    <label for="edicao">edição:</label>
                    <input type="text" name="edicao" id="edicao" class="livroInput" required>
                </div>
                <div class="formCampo">
                    <label for="editora">editora:</label>
                    <input type="text" name="editora" id="editora" class="livroInput" required>
                </div>
                <div class="formCampo">
                    <label for="genero">gênero:</label>
                    <input type="text" name="genero" id="genero" class="livroInput" required>
                </div>
                <div class="formCampo">
                    <label for="anoPublicacao">ano de publicação:</label>
                    <input type="date" name="anoPublicacao" id="anoPublicacao" class="livroInput" required>
                </div>
                <div class="formCampo">
                    <label for="quantidade">quantidade:</label>
                    <input type="number" name="quantidade" id="quantidade" class="livroInput" required>
                </div>
                <input type="submit" value="enviar" id="livrosSubmit">
            </form>
        </div>
    </div>
</div>
<script src="telas/livros/livros.js"></script>