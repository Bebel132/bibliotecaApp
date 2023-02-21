<head>
<script src="https://kit.fontawesome.com/4b1186e948.js" crossorigin="anonymous"></script>
</head>
<div class="main-container usuarios-container">
    <div class="main-titulo">
        <h1>Pessoas Cadastradas</h1>
    </div>
    <div class="main-escolhas">
        <form action="">
            <label for="alunos">alunos: </label>
            <input type="checkbox" name="alunos" id="">
            <label for="professores">professores: </label>
            <input type="checkbox" name="professores" id="">
            <label for="gestao">gestão: </label>
            <input type="checkbox" name="gestao" id="">
        </form>
    </div>
    <div class="mainContent">
        <div class="main-tabela">
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>nome</th>
                        <th>função</th>
                        <th>turma</th>
                        <th>telefone</th>
                        <th>nome responsável</th>
                        <th>telefone responsável</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require("../php/connect.php");
                    $app->verUsuarios($conn, "todos");
                    ?>
                </tbody>
            </table>
        </div>
        <div class="main-formulario">
            <form action="">
                <div class="formCampo">
                    <label for="nome">nome:</label>
                    <input type="text" name="nome" id="nome" class="usuariosInput">
                </div>
                <div class="formCampo">
                    <label for="funcao">função:</label>
                    <select name="funcao" id="funcao" class="usuariosInput">
                        <option value="aluno">aluno</option>
                        <option value="gestao">gestão</option>
                        <option value="biologia">biologia</option>
                        <option value="educacaoFisica">educação física</option>
                        <option value="filosofia-sociologia">filosofia/sociologia</option>
                        <option value="geografia">geografia</option>
                        <option value="historia">história</option>
                        <option value="tecnico">técnico</option>
                        <option value="espanhol">espanhol</option>
                        <option value="ingles">inglês</option>
                        <option value="portugues">português</option>
                        <option value="matematica">matemática</option>
                        <option value="quimica">química</option>
                    </select>
                </div>
                <div class="formCampo">
                    <label for="turma">turma</label>
                    <select name="turma" id="turma" class="usuariosInput">
                        <option value="1info">1° informática</option>
                        <option value="2info">2° informática</option>
                        <option value="3info">3° informática</option>
                        <option value="1enfer">1° enfermagem</option>
                        <option value="2enfer">2° enfermagem</option>
                        <option value="3enfer">3° enfermagem</option>
                        <option value="1guia">1° guia</option>
                        <option value="2guia">2° guia</option>
                        <option value="3guia">3° guia</option>
                    </select>
                </div>
                <div class="formCampo">
                    <label for="telefone">telefone:</label>
                    <input type="text" name="telefone" id="telefone" class="usuariosInput">
                </div>
                <div class="formCampo">
                    <label for="nomeResp">nome do responsável:</label>
                    <input type="text" name="nomeResp" id="nomeResp" class="usuariosInput">
                </div>
                <div class="formCampo">
                    <label for="telefoneResp">telefone do responsável:</label>
                    <input type="text" name="telefoneResp" id="telefoneResp" class="usuariosInput">
                </div>
                <input type="submit" value="enviar" id="usuariosSubmit">
            </form>
        </div>
    </div>
</div>
<script src="telas/usuarios/usuarios.js"></script>