<?php
    include "lerDadosBanco.php";
    $servername = retornaDado(1);
    $username = retornaDado(2);
    $password = retornaDado(3);
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
                $select .=  "usuario LIKE '%" . $usuario . "%' ";
                $aux = 1;
            }
            $aux2 = -1;
            if ((isset($_POST['cliente'])) && (!isset($_POST['gerente']))) {
                if ($aux == 1) {
                    $select .=  "AND ";
                }
                $select .=  "tipo = 0";
                $aux = 1;
                $aux2 = 0;
            }
            else if ((isset($_POST['gerente'])) && (!isset($_POST['cliente']))) {
                if ($aux == 1) {
                    $select .=  "AND ";
                }
                $select .=  "tipo = 1";
                $aux = 1;
                $aux2 = 1;
            } 
            else if ((!isset($_POST['gerente'])) && (!isset($_POST['cliente']))) {
                if ($aux == 1) {
                    $select .=  "AND ";
                }
                $select .=  "tipo = 9";
                $aux = 1;
                $aux2 = 2;
            }
            if ($aux == 0) {
                $select = "SELECT * FROM cliente";
            }
            $result = $conn->query($select);
            $html = '<script type="text/javascript">
                        document.getElementsByName("nome")[0].value = "' . $nome . '";
                        document.getElementsByName("cpf")[0].value = "' . $cpf . '";
                        document.getElementsByName("mes")[0].value = "' . $mes . '";
                        document.getElementsByName("ano")[0].value = "' . $ano . '";
                        document.getElementsByName("cidade")[0].value = "' . $cidade . '";
                        document.getElementsByName("pais")[0].value = "' . $pais . '";
                        document.getElementsByName("usuario")[0].value = "' . $usuario . '";';
            switch ($aux2) {
                case -1: 
                    $html .= 'document.getElementsByName("gerente")[0].checked = true;';
                    $html .= 'document.getElementsByName("cliente")[0].checked = true;';
                    $html .= '</script>';
                    break;
                case 0: 
                    $html .= 'document.getElementsByName("gerente")[0].checked = false;';
                    $html .= 'document.getElementsByName("cliente")[0].checked = true;';
                    $html .= 'v</script>';
                    break;
                case 1: 
                    $html .= 'document.getElementsByName("gerente")[0].checked = true;';
                    $html .= 'document.getElementsByName("cliente")[0].checked = false;';
                    $html .= '</script>';
                    break;
                case 2: 
                    $html .= 'document.getElementsByName("gerente")[0].checked = false;';
                    $html .= 'document.getElementsByName("cliente")[0].checked = false;';
                    $html .= '</script>';
                    break;
            }
            echo $html;
        }
        else {
            $result = $conn->query("SELECT * FROM cliente");
        }

        if ($result->rowCount() > 0) {
            $tipo = "";
            echo "<table class='w3-table-all lista'>
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
                </tr>";
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