<?php
require_once './cabecalho.php';
require_once './banco-funcao.php';
require_once './conecta.php';

$usuario = $_REQUEST['login'];
$senha = $_REQUEST['senha'];



validarLogin($conexao,$usuario,$senha);


?>


