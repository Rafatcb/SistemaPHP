<?php
Session_start();
$_SESSION['tipo'] = 3;
header("Location: index.php");
exit;
?>