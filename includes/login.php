<?php
require_once './banco-funcao.php';
require_once './conecta.php';
require_once './cabecalho.php';

$usuario = $_REQUEST ['login'];
$senha = $_REQUEST['senha'];
$resultado = validarLogin($conexao,$usuario,$senha);



