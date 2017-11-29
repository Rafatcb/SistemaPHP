<?php
	
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include __DIR__ . "\\lerDadosBanco.php";
	$servername = retornaDado(1);
	$username = retornaDado(2);
	$password = retornaDado(3);

	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$conn = new PDO("mysql:host=$servername;dbname=trabalho_php", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$result = $conn->query("SELECT * FROM cliente WHERE usuario = '$usuario' and senha = '".md5($senha)."'");
	
	if ($result->rowCount() == 0) {
		echo '<div id="myModal" class="modal-info">
				<div class="modal-content-info">
					<div onclick="fechar();"><span class="close">&times;</span></div>
					<p id="modalP">Erro!</p>
				</div>
			</div>';
		echo '<script type="text/javascript">
				var html = "Erro - Usuário e/ou senha inválidos"
				document.getElementById("modalP").innerHTML = html;
				document.getElementById("myModal").style.display = "block";
			</script>';
	}
	else {
		$row = $result->fetch();
		if ($row["tipo"] == 1) {
			$_SESSION['tipo'] = 1;
			$_SESSION['usuario'] = $row["usuario"];
			$_SESSION['senha'] = $row["senha"];
			header("Location: ../SistemaPHP/cadastro.php");
			exit;
		}
		else{
			$tipo = "Cliente";
			$_SESSION['tipo'] = 0;
			$_SESSION['usuario'] = $row["usuario"];
			$_SESSION['senha'] = $row["senha"];
			header("Location: ../SistemaPHP/consulta.php");
			exit;
		}
		echo "$tipo";
	}
	$conn = null;
}
?>