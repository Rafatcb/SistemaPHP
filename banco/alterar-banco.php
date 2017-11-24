<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    $usuario = "rafatcb"; // AQUI FICA O USUÁRIO LOGADO PELA SESSION

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $conn = new PDO("mysql:host=$servername;dbname=trabalho_php", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $result = $conn->query("SELECT senha FROM cliente WHERE usuario='" . $usuario . "'");
                $row = $result->fetch();
                $atual = md5($_POST['senha_atual']);
                if ($row["senha"] == $atual) {
                    $senha = $_POST['senha'];
                    $confirmarSenha = $_POST['confirmar'];
                    if (($senha != null) && ($senha != "")) {
                        if ($confirmarSenha == $senha) {
                            $stmt = $conn->prepare("UPDATE cliente SET telefone = :telefone, email = :email, data_aniversario = :dato,
                                cep = :cep, cidade = :cid, pais = :pais, bairro = :bairro, rua = :rua, numero = :num,
                                complemento = :com, senha = :senha WHERE usuario = :user");
                            $senha = md5($senha);
                            $stmt->bindValue(':senha', $senha);
                        }
                        else {
                            echo '<div id="myModal" class="modal-info">
                                    <div class="modal-content-info">
                                        <div onclick="fechar();"><span class="close">&times;</span></div>
                                        <p id="modalP">Erro!</p>
                                    </div>
                                </div>';
                            echo '<script type="text/javascript">
                                    var html = "Erro - As senhas informadas são diferentes"
                                    document.getElementById("modalP").innerHTML = html;
                                    document.getElementById("myModal").style.display = "block";
                                </script>';
                            return;
                        }
                    }
                    else {
                        $stmt = $conn->prepare("UPDATE cliente SET telefone = :telefone, email = :email, data_aniversario = :dato,
                        cep = :cep, cidade = :cid, pais = :pais, bairro = :bairro, rua = :rua, numero = :num,
                        complemento = :com WHERE usuario = :user");
                    }
    
                    $testeData = strtotime($_POST['data']);
                    $data = null;
                    if ($testeData != false){
                        $data = date('Y-m-d', $testeData);
                    }
    
                    $stmt->bindValue(':user', $usuario);
                    $stmt->bindValue(':telefone', $_POST['telefone']);
                    $stmt->bindValue(':email', $_POST['email']);
                    $stmt->bindValue(':dato', $data);
                    $stmt->bindValue(':cep', $_POST['cep']);
                    $stmt->bindValue(':cid', $_POST['cidade']);
                    $stmt->bindValue(':pais', $_POST['pais']);
                    $stmt->bindValue(':bairro', $_POST['bairro']);
                    $stmt->bindValue(':rua', $_POST['rua']);
                    $stmt->bindValue(':num', $_POST['numero']);
                    $stmt->bindValue(':com', $_POST['complemento']);
                    $stmt->execute();
    
                    if ($stmt->rowCount() == 1) {
                        echo '<div id="myModal" class="modal-info">
                                <div class="modal-content-info">
                                    <div onclick="fechar();"><span class="close">&times;</span></div>
                                    <p id="modalP">Erro!</p>
                                </div>
                            </div>';
                        echo '<script type="text/javascript">
                                var html = "Dados alterados com sucesso";
                                document.getElementById("modalP").innerHTML = html;
                                document.getElementById("myModal").style.display = "block";
                            </script>';
                    }
                    else {
                        echo '<div id="myModal" class="modal-info">
                                <div class="modal-content-info">
                                    <div onclick="fechar();"><span class="close">&times;</span></div>
                                    <p id="modalP">Erro!</p>
                                </div>
                            </div>';
                        echo '<script type="text/javascript">
                                var html = "Nenhum dado foi alterado";
                                document.getElementById("modalP").innerHTML = html;
                                document.getElementById("myModal").style.display = "block";
                            </script>';
                    }
                }
                else {
                    echo '<div id="myModal" class="modal-info">
                            <div class="modal-content-info">
                                <div onclick="fechar();"><span class="close">&times;</span></div>
                                <p id="modalP">Erro!</p>
                            </div>
                        </div>';
                    echo '<script type="text/javascript">
                            var html = "Senha inválida! Nenhum dado foi alterado";
                            document.getElementById("modalP").innerHTML = html;
                            document.getElementById("myModal").style.display = "block";
                        </script>';
                }
                $conn = null;
                mostrarDados($username, $servername, $password, $usuario);
            }
            catch(PDOException $e){
                echo '<div id="myModal" class="modal-info">
                        <div class="modal-content-info">
                            <div onclick="fechar();"><span class="close">&times;</span></div>
                            <p id="modalP">Erro!</p>
                        </div>
                    </div>';
                echo '<script type="text/javascript">
                        var html = 
                        document.getElementById("modalP").innerHTML = html;
                        document.getElementById("myModal").style.display = "block";
                    </script>';
            }
        }
        else {
            mostrarDados($username, $servername, $password, $usuario);
        }
    

    function mostrarDados($u, $s, $p, $user) {
        try {
            $conn = new PDO("mysql:host=$s;dbname=trabalho_php", $u, $p);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            $result = $conn->query("SELECT * FROM cliente WHERE usuario='" . $user . "'");
            $row = $result->fetch();
            if ($row["tipo"] == 1) {
                $html = '<label>Gerente</label';

                echo '<script type="text/javascript">
                    document.getElementById("checks").innerHTML = "' . $html . '";
                </script>';
            }
            else {
                $html = "<label id='cliente'>Cliente</label>";

                echo '<script type="text/javascript">
                    document.getElementById("checks").innerHTML = "' . $html . '";
                    document.getElementById("cliente").style.fontSize = "17px";
                </script>';
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
                $data = date("Y-m-d", strtotime($row["data_aniversario"]));
            }
            echo '<script type="text/javascript">
                    document.getElementsByName("nome")[0].value = "' . $row["nome"] . '";
                    document.getElementsByName("cpf")[0].value = "' . $row["cpf"] . '";
                    document.getElementsByName("telefone")[0].value = "' . $row["telefone"] . '";
                    document.getElementsByName("email")[0].value = "' . $row["email"] . '";
                    document.getElementsByName("data")[0].value = "' . $data . '";
                    document.getElementsByName("cep")[0].value = "' . $row["cep"] . '";
                    document.getElementsByName("cidade")[0].value = "' . $row["cidade"] . '";
                    document.getElementsByName("pais")[0].value = "' . $row["pais"] . '";
                    document.getElementsByName("bairro")[0].value = "' . $row["bairro"] . '";
                    document.getElementsByName("rua")[0].value = "' . $row["rua"] . '";
                    document.getElementsByName("numero")[0].value = "' . $numero . '";
                    document.getElementsByName("complemento")[0].value = "' . $row["complemento"] . '";
                    document.getElementsByName("usuario")[0].value = "' . $row["usuario"] . '";
                </script>';
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
    }
?>