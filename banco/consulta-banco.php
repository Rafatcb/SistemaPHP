<?php
    $servername = "localhost";
    $username = "root";
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
                <th>Aniversário</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>País</th>
                <th>CEP</th>
                <th>Cidade</th>
                <th>Bairro</th>
                <th>Rua</th>
                <th>Numero</th>
                <th>Complemento</th>
            </tr>
        </thead>";
        if ($result->rowCount() > 1) {
            $tipo = "";
            while($row = $result->fetch()) {
                if ($row["usuario"] != "admin") {
                    if ($row["tipo"] == 1) {
                        $tipo = "Gerente";
                    }
                    else {
                        $tipo = "Cliente";
                    }
                    if ($row["numero"] == 0) {
                        $numero = "";
                    }
                    else {
                        $numero = $row["numero"];
                    }
                    echo "<tr onclick='infoUser()'><td>".$tipo."</td><td>".$row["usuario"]."</td><td>"
                        .$row["nome"]."</td><td>".$row["cpf"]."</td><td>". date("d/m/Y", strtotime($row["data_aniversario"]))."</td><td>"
                        .$row["email"]."</td><td>".$row["telefone"]."</td><td>".$row["pais"]."</td><td>"
                        .$row["cep"]."</td><td>".$row["cidade"]."</td><td>".$row["bairro"]."</td><td>"
                        .$row["rua"]."</td><td>".$numero."</td><td>".$row["complemento"]."</td></tr>";
                }
            }
        } else {
           echo "Nenhum usuário foi encontrado";
        }
        echo "</table>";
        $conn = null;
    }
    catch(PDOException $e){
        echo "Conexão com o banco de dados não estabelecida: " . $e->getMessage();
    }
?>