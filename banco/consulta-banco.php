<?php
    $servername = "localhost";
    $username = "username";
    $password = "";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=trabalho_php", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    
        $result = $conn->query("SELECT * FROM cliente");
    
        echo "<table class='w3-table-all lista'>
        <tthead>
            <tr class='cor-th'>
                <th>Tipo</th>
                <th>Usuário</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Cidade</th>
                <th>País</th>
            </tr>
        </thead>";
        if ($result->num_rows > 1) {
            $tipo = "";
            while($row = $result->fetch_assoc()) {
                if ($row["tipo"] == 1) {
                    $tipo = "Gerente";
                }
                else {
                    $tipo = "Cliente";
                }
                echo "<tr><td>".$tipo."</td><td>".$row["usuario"]."</td><td>".$row["nome"]." ".$row["cpf"]."</td><td>".$row["cidade"]."</td><td>".$row["pais"]."</td></tr>";
            }
        } else {
            // aqui mostra modal "nenhum usuário encontrado" caso tenha clicado no botão de consulta, não onload
        }
        echo "</table>";
        $conn = null;
    }
    catch(PDOException $e){
        echo "Conexão com o banco de dados não estabelecida: " . $e->getMessage();
    }
?>