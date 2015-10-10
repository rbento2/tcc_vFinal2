<?php session_start();
require_once './banco-funcao.php';
require_once './conecta.php';


$idComanda = $_SESSION['comanda'];

$qtdBebida =$_REQUEST['quantidadeBebida'];
$idBebida = $_REQUEST['itemMenuBebida'];
$idPrato = $_REQUEST['itemMenuPrato'];
$qtdPrato = $_REQUEST['quantidadePrato'];

 
for($i=0; $i!=count($idBebida); $i++){
   if($qtdBebida[$i]>0){
      $teste= inserirPedidos($conexao,$qtdBebida[$i],$idComanda,$idBebida);
   }
}
for($i=0; $i!=count($idPrato); $i++){
   if($qtdPrato[$i]>0){
      $teste2= inserirPedidos($conexao,$qtdPrato[$i],$idComanda,$idPrato);
   }
}


if($teste== false || $teste2 == false){
            msg( "error", "Erro ao realizar o pedido","Por favor entre em contato com o suporte "," ./menu.php");
      }else{
            msg( "success", "Pedido realizado com sucesso ","Em breve o entregaremos !"," ./menu.php");    
      }

//if($qtdBebida != 0 && $idBebida!='')


/*
todos os clientes  tem direito a tudo(insere tudo) e faça uma rotina no final para verificar as  quantidades != 0 
 * 
 * 
 *  fazer a validação do formulario via javascript (ver se tem alguma coisa encrita) 
 */

