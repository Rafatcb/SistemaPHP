<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $servername = "localhost";
        $username = "root";
        $password = "";
        
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
                    $stmt = $conn->prepare("INSERT INTO cliente (nome, data_aniversario, cpf, usuario, senha, telefone, email, rua, 
                        numero, bairro, complemento, cidade, cep, pais, tipo)
                    VALUES (:nome,:dato,:cpf,:usuario,:senha,:tel,:email,:rua,:num,:bairro,:comp,:cid,:cep,:pais,:tipo)");
            
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
                    $stmt->bindParam(':nome', $nome);
                    $stmt->bindParam(':dato', $data);
                    $stmt->bindParam(':cpf', $cpf);
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

                    $stmt->execute();
                    echo "Usuário cadastrado com sucesso";
                }
                else {
                    echo "Usuário já cadastrado";
                }
                
                $conn = null;
            }
            catch(PDOException $e){
                if ($e->getcode() == 23000) {
                    echo "Usuário já cadastrado";
                }
                else {
                    echo "Conexão com o banco de dados não estabelecida: " . $e->getMessage();
                }
            }
        }
        else {
            echo "nope";
        }
    }
?>