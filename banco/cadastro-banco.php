<?php
    $servername = "localhost";
    $username = "username";
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
            
            $sql = "INSERT INTO cliente (nome, data_aniversario, cpf, usuario, senha, telefone, email, rua, 
                numero, bairro, complemento, cidade, cep, pais, tipo)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = mysqli_prepare($sql);
    
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
    
            $stmt->bind_param("sss", $nome, $data, $cpf, $usuario, $senha, $_POST['telefone'], 
                $_POST['email'], $_POST['rua'], $_POST['numero'], $_POST['bairro'], $_POST['complemento'], 
                $_POST['cidade'], $_POST['cep'], $_POST['pais'], $tipo);
            $stmt->execute();
    
            $conn = null;
        }
        catch(PDOException $e){
            echo "Conexão com o banco de dados não estabelecida: " . $e->getMessage();
        }
    }
    else {
        echo "nope";
        // Mostra modal falando que precisa preencher todos os campos obrigatórios *
    }
?>