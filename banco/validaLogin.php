<?php
	session_start();
	if ($_SESSION['tipo'] == 1) {
		header("Location: erro.php");
		exit;
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include "lerDadosBanco.php";
	$servername = retornaDado(1);
	$username = retornaDado(2);
	$password = retornaDado(3);

	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$conn = new PDO("mysql:host=$servername;dbname=trabalho_php", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$result = $conn->query("SELECT * FROM cliente WHERE usuario = '$usuario' and senha = '".md5($senha)."'");
	
	if ($result->rowCount() == 0) {
		echo '';
	}
	else {
		$row = $result->fetch();
		if ($row["tipo"] == 1) {
			$_SESSION['tipo'] = 1;
			$_SESSION['usuario'] = $row["usuario"];
			$_SESSION['senha'] = $row["senha"];
			header("Location: ../cadastro.php");
			exit;
		}
		else{
			$tipo = "Cliente";
			$_SESSION['tipo'] = 0;
			$_SESSION['usuario'] = $row["usuario"];
			$_SESSION['senha'] = $row["senha"];
			header("Location: ../consulta.php");
			exit;
		}
		echo "$tipo";
	}
	$conn = null;
}
?>