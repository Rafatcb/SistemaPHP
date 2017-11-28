<?php
    include "lerDadosBanco.php";
    $servername = retornaDado(1);
    $username = retornaDado(2);
    $password = retornaDado(3);
    try {
        $conn = new PDO("mysql:host=$servername;dbname=phpmyadmin", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Create database
        $sql = "CREATE DATABASE trabalho_php;
            USE trabalho_php;
            -- phpMyAdmin SQL Dump
            -- version 4.7.0
            -- https://www.phpmyadmin.net/
            --
            -- Host: 127.0.0.1
            -- Generation Time: 14-Nov-2017 às 12:13
            -- Versão do servidor: 10.1.25-MariaDB
            -- PHP Version: 7.0.21
            
            SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
            SET AUTOCOMMIT = 0;
            START TRANSACTION;
            SET time_zone = '+00:00';
            
            
            /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
            /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
            /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
            /*!40101 SET NAMES utf8mb4 */;
            
            --
            -- Database: `trabalho_php`
            --
            
            -- --------------------------------------------------------
            
            --
            -- Estrutura da tabela `cliente`
            --
        
        
            CREATE TABLE `cliente` (
                `nome` char(50) NOT NULL,
                `data_aniversario` date DEFAULT NULL,
                `cpf` char(14) NOT NULL,
                `usuario` char(20) NOT NULL,
                `senha` char(32) NOT NULL,
                `telefone` char(19) DEFAULT NULL,
                `email` char(40) DEFAULT NULL,
                `rua` char(40) DEFAULT NULL,
                `numero` int(11) DEFAULT NULL,
                `bairro` char(30) DEFAULT NULL,
                `complemento` char(30) DEFAULT NULL,
                `cidade` char(40) DEFAULT NULL,
                `cep` char(12) DEFAULT NULL,
                `pais` char(30) DEFAULT NULL,
                `tipo` tinyint(1) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela que guarda os dados dos clientes do sistema';
            
            --
            -- Indexes for dumped tables
            --
            
            --
            -- Indexes for table `cliente`
            --
            ALTER TABLE `cliente`
            ADD PRIMARY KEY (`usuario`);
            COMMIT;
            
            /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
            /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
            /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
        $conn->exec($sql);
        $conn = null;

        $conn = new PDO("mysql:host=$servername;dbname=trabalho_php", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = " INSERT INTO cliente (usuario, senha, nome, tipo)
                VALUES ('admin', 'admin', 'Admin', '1');";
        $conn->exec($sql);
        $conn = null;
        echo "Banco criado com sucesso";
    }
    catch(PDOException $e){
        echo "Conexão com o banco de dados não estabelecida: " . $e->getMessage();
    }
?>