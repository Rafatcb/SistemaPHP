<?php
    function retornaDado($x){
        $arquivo = fopen("Login do Banco.txt", "r");
        fgets($arquivo);
        $buffer = fgets($arquivo);
        $serverName = substr($buffer, 11);
        $serverName =  preg_replace("/\r?\n/","", $serverName);
        $buffer = fgets($arquivo);
        $usuario = substr($buffer, 8);
        $usuario =  preg_replace("/\r?\n/","", $usuario);
        $buffer = fgets($arquivo);
        $senha = substr($buffer, 6);
        $senha =  preg_replace("/\r?\n/","", $senha);
        if($x == 1){
            return $serverName;
        }
        elseif($x == 2){
            return $usuario;
        }
        elseif($x == 3){
            if($senha == null){
                return "";
            }
            else{
                return $senha;
            }
        }
    }      
?>