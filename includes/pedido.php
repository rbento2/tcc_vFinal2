<?php
require_once './banco-funcao.php';
require_once './conecta.php';
//require_once './cabecalho.php';



$qtdBebida =$_REQUEST['quantidadeBebida'];
$idBebida = $_REQUEST['itemMenuBebida'];
$idPrato = $_REQUEST['itemMenuPrato'];
$qtdPrato = $_REQUEST['quantidadePrato'];
var_dump($qtdBebida); 
var_dump($idBebida); 
var_dump($idPrato); 
var_dump($qtdPrato); 



echo $qtdBebida[0]; 
echo $idBebida[0]; 
echo $idPrato[0]; 
echo $qtdPrato[0]; 
die();
//if($qtdBebida != 0 && $idBebida!='')



