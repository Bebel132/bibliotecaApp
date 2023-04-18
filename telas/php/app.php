<?php
class App {
    private $servername = null;
    private $username = null;
    private $password = null;
    private $dbname = null;

    public function __construct($svname, $usname, $passw, $dbnam){
        $this->servername = $svname;
        $this->username = $usname;
        $this->password = $passw;
        $this->dbname = $dbnam;
    }

    public function connectDB(){
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function adicionarUsuario($conn, $qtn, $nome, $funcao, $telefone, $turma = "", $nomeResp = "", $telefoneResp = ""){
        if($qtn == 6){
            try {
                $sql = "INSERT INTO usuario(nomeCompleto, funcao, turma, telefone, nomeResp, telResp) VALUES ('$nome', '$funcao', '$turma', '$telefone', '$nomeResp', '$telefoneResp')";
                $conn->exec($sql);
            } catch (PDOException $e){
                echo "<br>" . $e->getMessage();
            }
        } else {
            try {
                $sql = "INSERT INTO usuario(nomeCompleto, funcao, telefone) VALUES ('$nome', '$funcao', '$telefone')";
                $conn->exec($sql);
            } catch (PDOException $e){
                echo "<br>" . $e->getMessage();
            }
        }
        $conn = null;
    }

    public function verUsuarios($conn, $condicao = "", $nome = ""){
        if($condicao == "todos"){
            try {
                $sql = "SELECT * FROM usuario";
                $arr = $conn->query($sql);
                while($row = $arr->fetch()){
                    echo "
                        <tr>    
                            <td>".$row['id']."</td>
                            <td>".$row['nomeCompleto']."</td>
                            <td>".$row['funcao']."</td>
                            <td>".$row['turma']."</td>
                            <td>".$row['telefone']."</td>
                            <td>".$row['nomeResp']."</td>
                            <td>".$row['telResp']."</td>
                            <td class='botao'><button class='apagar'>apagar</button></td>
                        </tr>";
                }
            } catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
        } else if($condicao == "especificos") {
            try {
                $sql = "SELECT * FROM usuario WHERE nomeCompleto LIKE '%$nome%'";
                $arr = $conn->query($sql);
                while($row = $arr->fetch()){
                    echo "
                        <tr>
                            <td>".$row['id']."</td>
                            <td>".$row['nomeCompleto']."</td>
                            <td>".$row['funcao']."</td>
                            <td>".$row['turma']."</td>
                            <td>".$row['telefone']."</td>
                            <td>".$row['nomeResp']."</td>
                            <td>".$row['telResp']."</td>
                            <td class='botao'><button class='selecionar selUsuario'>selecionar</button></td>
                        </tr>";
                }
            } catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
        }
        
        $conn = null;
    }

    public function apagarUsuario($conn, $id){
        try{
            $sql = "DELETE FROM usuario WHERE id=$id";
            $conn->exec($sql);
        } catch(PDOException $e){
            echo "<script>
                alert('não é possível apagar um usuario que está com livro emprestado')
            </script>";
        }
        $conn = null;
    }
  
    public function adicionarEmprestimo($conn, $idLocador, $idLivro, $dataEntrega){
        try {
            $sql = "INSERT INTO emprestimo(idLocador, idLivro, dataEntrega, estado) VALUES ('$idLocador', '$idLivro', '$dataEntrega', 'ativo')";
            $conn->exec($sql);
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function verEmprestimos($conn){
        try {
            $sql = "SELECT emprestimo.id, nomeCompleto, titulo, funcao, turma, dataEntrega, telefone, estado from emprestimo INNER JOIN usuario on usuario.id = emprestimo.idLocador INNER JOIN livro on livro.id = emprestimo.idLivro";
            $arr = $conn->query($sql);
            while($row = $arr->fetch()){
                if($row['estado'] == "ativo"){
                echo "
                    <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['nomeCompleto']."</td>
                        <td>".$row['titulo']."</td>
                        <td>".$row['funcao']."</td>
                        <td>".$row['turma']."</td>
                        <td>".$row['dataEntrega']."</td>
                        <td>".$row['telefone']."</td>
                        <td class='botao'><button class='apagar'>apagar</button></td>
                    </tr>";
                }
            }
        } catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    public function apagarEmprestimo($conn, $id){
        try{
            $sql = "UPDATE emprestimo SET estado='entregue' WHERE id=$id";
            $conn->exec($sql);
        } catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    public function adicionarLivro($conn, $titulo, $autor, $edicao, $editora, $quantidade, $genero, $anoPublicacao){
        try{
            $sql = "INSERT INTO livro (titulo, autor, edicao, editora, quantidade, genero, anoPublicacao) VALUES ('$titulo', '$autor', '$edicao', '$editora', '$quantidade', '$genero', '$anoPublicacao')";
            $conn->exec($sql);
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    public function verLivros($conn, $condicao = "", $titulo = ""){
        if($condicao == "todos"){
            try {
                $sql = "SELECT * FROM livro";
                $arr = $conn->query($sql);
                while($row = $arr->fetch()){
                    echo "
                        <tr>
                            <td>".$row['id']."</td>
                            <td>".$row['titulo']."</td>
                            <td>".$row['autor']."</td>
                            <td>".$row['edicao']."</td>
                            <td>".$row['genero']."</td>
                            <td>".$row['editora']."</td>
                            <td class='botao'><button class='registros'>registros</button></td>
                            <td class='botao'><button class='apagar'>apagar</button></td>
                        </tr>";
                }
            } catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
        } else if($condicao == "especificos"){
            try {
                $sql = "SELECT * FROM livro WHERE titulo like '%$titulo%'";
                $arr = $conn->query($sql);
                while($row = $arr->fetch()){
                    echo "
                        <tr>
                            <td>".$row['id']."</td>
                            <td>".$row['titulo']."</td>
                            <td>".$row['autor']."</td>
                            <td>".$row['edicao']."</td>
                            <td>".$row['genero']."</td>
                            <td>".$row['editora']."</td>
                            <td class='botao'><button class='selecionar selLivro'>selecionar</button></td>
                        </tr>";
                }
            } catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
        }
        
        $conn = null;
    }

    public function verLivroRegistros($conn, $idLivro){
        try{
            $sql = "SELECT nomeCompleto, dataEntrega FROM emprestimo INNER JOIN usuario ON usuario.id = emprestimo.idLocador WHERE idLivro = $idLivro";
            $arr = $conn->query($sql);
            while($row = $arr->fetch()){
                echo "
                <tr>
                    <td>".$row['nomeCompleto']."</td>
                    <td>".$row['dataEntrega']."</td>
                </tr>";
            }
        } catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
        ;

    }

    public function apagarLivro($conn, $id){
        try{
            $sql = "DELETE FROM livro WHERE id=$id";
            $conn->exec($sql);
        } catch(PDOException $e){
            echo "<script>
                alert('não é possível apagar um livro que está emprestado')
            </script>";
        }
        $conn = null;
    }
}
?>
