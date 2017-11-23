<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=trabalho_php", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $mes = $_POST['mes'];
            $ano = $_POST['ano'];
            $cidade = $_POST['cidade'];
            $pais = $_POST['pais'];
            $usuario = $_POST['usuario'];
            $select = "SELECT * FROM cliente WHERE ";
            $aux = 0;
            if ($nome != "") {
                if ($aux == 0) {
                    $select .= "nome LIKE '%". $nome ."%' ";
                    $aux = 1;
                }
            }
            if ($cpf != "") {
                if ($aux == 1) {
                    $select .=  "AND ";
                }
                $select .= "cpf LIKE '%" . $cpf . "%' ";
                $aux = 1;
            }
            if ($mes != "Nenhum") {
                if ($aux == 1) {
                    $select .=  "AND ";
                }
                $select .=  "MONTH(data_aniversario) = " .$mes . " ";
                $aux = 1;
            }
            if ($ano != "") {
                if ($aux == 1) {
                    $select .=  "AND ";
                }
                $select .=  "YEAR(data_aniversario) = " .$ano . " ";
                $aux = 1;
            }
            if ($cidade != "") {
                if ($aux == 1) {
                    $select .=  "AND ";
                }
                $select .=  "cidade LIKE '%" . $cidade . "%' ";
                $aux = 1;
            }
            if ($pais != "Nenhum") {
                if ($aux == 1) {
                    $select .=  "AND ";
                }
                $select .=  "pais = '" . $pais . "' ";
                $aux = 1;
            }
            if ($usuario != "") {
                if ($aux == 1) {
                    $select .=  "AND ";
                }
                $select .=  "usuario LIKE '%" . $usuario . "%'";
                $aux = 1;
            }
            if ($aux == 0) {
                $select = "SELECT * FROM cliente";
            }
            $result = $conn->query($select);
        }
        else {
            $result = $conn->query("SELECT * FROM cliente");
        }

        if ($result->rowCount() > 0) {
            $tipo = "";
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
                    if ($row["data_aniversario"] == "") {
                        $data = "";
                    }
                    else {
                        $data = date("d/m/Y", strtotime($row["data_aniversario"]));
                    }
                    echo "<tr><td>".$tipo."</td><td>".$row["usuario"]."</td><td>"
                        .$row["nome"]."</td><td>".$row["cpf"]."</td><td>". $data ."</td><td>"
                        .$row["email"]."</td><td>".$row["telefone"]."</td><td>".$row["pais"]."</td><td>"
                        .$row["cep"]."</td><td>".$row["cidade"]."</td><td>".$row["bairro"]."</td><td>"
                        .$row["rua"]."</td><td>".$numero."</td><td>".$row["complemento"]."</td></tr>";
                }
            }
            echo "</table>";
        } else {
            echo '<div id="myModal" class="modal-info">
                    <div class="modal-content-info">
                        <div onclick="fechar();"><span class="close">&times;</span></div>
                        <p id="modalP">Erro!</p>
                    </div>
                </div>';
            echo '<script type="text/javascript">
                    var html = "Nenhum usuário foi encontrado";
                    document.getElementById("modalP").innerHTML = html;
                    document.getElementById("myModal").style.display = "block";
                </script>';
        }
        $conn = null;
    }
    catch(PDOException $e){
        echo '<div id="myModal" class="modal-info">
                <div class="modal-content-info">
                    <div onclick="fechar();"><span class="close">&times;</span></div>
                    <p id="modalP">Erro!</p>
                </div>
            </div>';
        echo '<script type="text/javascript">
                var html = "Erro - Conexão com o banco de dados não estabelecida: ' .  $e->getMessage() . '"
                document.getElementById("modalP").innerHTML = html;
                document.getElementById("myModal").style.display = "block";
            </script>';
    }
?>