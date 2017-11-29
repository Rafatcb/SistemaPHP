<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo '<div id="myModal" class="modal-info">
                <div class="modal-content-info">
                    <div onclick="fechar();"><span class="close">&times;</span></div>
                    <p id="modalP">Erro!</p>
                </div>
            </div>';

        include "lerDadosBanco.php";
        $servername = retornaDado(1);
        $username = retornaDado(2);
        $password = retornaDado(3);
    
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $confirmarSenha = $_POST['confirmar'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];

        if ((($usuario != null) && ($usuario != "")) && (($senha != null) && ($senha != "")) && 
            ($confirmarSenha == $senha) && (($nome != null) && ($nome != ""))  && (($cpf != null) && ($cpf != ""))) {
            try {
                $conn = new PDO("mysql:host=$servername;dbname=trabalho_php", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $result = $conn->query("SELECT * FROM cliente WHERE cpf = '$cpf' ");

                if ($result->rowCount() == 0) {
                    $aux = 1;
                    $result = $conn->query("SELECT * FROM cliente WHERE usuario = '$usuario' ");
                    if ($result->rowCount() != 0) {
                        echo '<script type="text/javascript">
                                var html = "Erro - Este Usuário já está cadastrado, com um CPF diferente";
                                document.getElementById("modalP").innerHTML = html;
                                document.getElementById("myModal").style.display = "block";
                            </script>';
                    }
                    $stmt = $conn->prepare("INSERT INTO cliente (nome, data_aniversario, cpf, usuario, senha, telefone, email, rua, 
                        numero, bairro, complemento, cidade, cep, pais, tipo)
                    VALUES (:nome,:dato,:cpf,:usuario,:senha,:tel,:email,:rua,:num,:bairro,:comp,:cid,:cep,:pais,:tipo)");
                    
                }
                else {
                    $aux = 0;
                    $result = $conn->query("SELECT * FROM cliente WHERE usuario = '$usuario' ");
                    if ($result->rowCount() != 0) {
                        echo '<script type="text/javascript">
                                var html = "Erro - Este Usuário já está cadastrado, com um CPF diferente";
                                document.getElementById("modalP").innerHTML = html;
                                document.getElementById("myModal").style.display = "block";
                            </script>';
                    }
                    $stmt = $conn->prepare("UPDATE cliente SET telefone = :tel, email = :email, data_aniversario = :dato,
                    cep = :cep, cidade = :cid, pais = :pais, bairro = :bairro, rua = :rua, numero = :num,
                    complemento = :comp, senha = :senha, nome = :nome, tipo = :tipo, usuario = :usuario WHERE cpf = :cpf");
                }
                if ($_POST['tipo'] == "cliente") {
                    $tipo = 0;
                }
                else {
                    $tipo = 1;
                }
                
                $testeData = strtotime($_POST['data']);
                $data = null;
                if ($testeData != false){
                    $data = date('Y-m-d', $testeData);
                }
        
                $senha = md5($senha);
                $stmt->bindParam(':cpf', $cpf);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':dato', $data);
                $stmt->bindParam(':usuario', $usuario);
                $stmt->bindParam(':senha', $senha);
                $stmt->bindParam(':tel', $_POST['telefone']);
                $stmt->bindParam(':email', $_POST['email']);
                $stmt->bindParam(':rua', $_POST['rua']);
                $stmt->bindParam(':num', $_POST['numero']);
                $stmt->bindParam(':bairro', $_POST['bairro']);
                $stmt->bindParam(':comp', $_POST['complemento']);
                $stmt->bindParam(':cid', $_POST['cidade']);
                $stmt->bindParam(':cep', $_POST['cep']);
                $stmt->bindParam(':pais', $_POST['pais']);
                $stmt->bindParam(':tipo', $tipo);
                echo "ué" .$stmt->fetch(\PDO::FETCH_ASSOC);
                $stmt->execute();
                if ($aux == 1) {
                    echo '<script type="text/javascript">
                            var html = "Usuário cadastrado com sucesso";
                            document.getElementById("modalP").innerHTML = html;
                            document.getElementById("myModal").style.display = "block";
                        </script>';
                }
                else {
                    echo '<script type="text/javascript">
                            var html = "Usuário alterado com sucesso";
                            document.getElementById("modalP").innerHTML = html;
                            document.getElementById("myModal").style.display = "block";
                        </script>';
                }
                $conn = null;
            }
            catch(PDOException $e){
                if ($e->getcode() == 23000) {
                    echo '<script type="text/javascript">
                            var html = "Erro - Usuário já cadastrado";
                            document.getElementById("modalP").innerHTML = html;
                            document.getElementById("myModal").style.display = "block";
                        </script>';
                }
                else {
                    echo '<script type="text/javascript">
                            var html = "Erro - Conexão com o banco de dados não estabelecida: ' .  $e->getMessage() . '"
                            document.getElementById("modalP").innerHTML = html;
                            document.getElementById("myModal").style.display = "block";
                        </script>';
                }
            }
        }
        else {
            $span = "<span class='obrigatorio'>*</span>";
            echo '<script type="text/javascript">
                    var html = "Erro - Preencha todos os campos ' . $span . '";
                    document.getElementById("modalP").innerHTML = html;
                    document.getElementById("myModal").style.display = "block";
                </script>';
        }
    }
?>