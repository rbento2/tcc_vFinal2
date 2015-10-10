<?php
require_once 'bancoFuncaoAdmin.php';
require_once '../conecta.php';
require_once '../banco-funcao.php';
require_once './cabecalho.php';

$nome  = $_REQUEST['nome'];
$cargo = $_REQUEST['cargo'];
$turno = $_REQUEST['turno'];
$login = $_REQUEST['login'];
$senha = $_REQUEST['senha'];
$tipo  = $_REQUEST['tipo'];
$confSenha = $_REQUEST['confSenha'];

if($tipo == $confSenha){ echo"asdasd";
$returnLogin = criarLogin($conexao, $login, $senha,$tipo); 
}else{
     msg('warning','As senhas n&atilde;o conferem','Por favor verifique se as senhas e tente novamente ','./index.php');
}
               echo"asdasd";
if($returnLogin === false  ){
     msg('error','Erro ao criar o Login','Por favor entre em contato com o suporte','./index.php');
}else{
    $returnFuncionario = criarFuncionario($conexao,$nome, $cargo, $turno,$returnLogin);
}

if($returnFuncionario == TRUE){
    msg('success','Usuario criado com sucesso','','./index.php');
}else{
    msg('error','Erro ao criar o Funcionario','Por favor entre em contato com o suporte','./index.php');
}
