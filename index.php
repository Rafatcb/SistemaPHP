<?php
session_start();
	if (isset($_SESSION['tipo']) == false){}
	else if ($_SESSION['tipo'] == 1) {
		header("Location: cadastro.php");
		exit;
	}
	else if ($_SESSION['tipo'] == 0) {
		header("Location: consulta.php");
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sistema PHP</title>
  <link rel="stylesheet" href="style/login.css">
  
</head>

<body>
	<div class="login">
		<h1>Entre</h1>
		
		<form class="form" method="post" action="<?=$_SERVER['PHP_SELF']?>">

		  <p class="field">
			<input type="text" name="usuario" placeholder="Usuário" required/>
			<i class="fa fa-user"></i>
		  </p>

		  <p class="field">
			<input type="password" name="senha" placeholder="Senha" required/>
			<i class="fa fa-lock"></i>
		  </p>

		  <p class="submit"><input type="submit" name="entrar" value="Entrar"></p>
		</form>
		<?php include "banco/validaLogin.php" ?>
	</div>	
	<script>
		// Quando o usuário clicar no botão X
		function fechar () {
				document.getElementById('myModal').style.display = "none";
		}

		// Quando o usuário clica em qualquer lugar fora do modal, fecha o modal
		window.onclick = function(event) {
				if (event.target == document.getElementById('myModal'))
						fechar();
		}
	</script>
</body>	
</html>
