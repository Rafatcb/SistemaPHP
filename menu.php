<ul class="menu">
	<?php
		if($_SESSION['tipo'] == 1){
			include "testeCadastro.php";
		}
	?>
	<li class="menuItem"><a href="consulta.php" id="menu-consulta">Consulta</a></li>
    <li style="float:right"  class="dropdown">
        <a href="#" class="dropbtn" id="menu-conta"><span class="glyphicon glyphicon-user"></span>&nbsp&nbsp Minha Conta</a>
        <div class="dropdown-conteudo">
            <a href="alterar-dados.php" class="dropdown-conteudo-a"><span class="glyphicon glyphicon-pencil"></span>&nbsp&nbsp Alterar Dados</a>
            <a href="logout.php" class="dropdown-conteudo-a">
				<span class="glyphicon glyphicon-log-out"></span>&nbsp&nbsp Sair
			</a>
        </div>
    </li>
</ul>