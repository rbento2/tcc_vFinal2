
<?php
require_once './banco-funcao.php';
require_once './conecta.php';

$teste=$_POST['optionsRadios'];

$result=finalizarItemComanda($conexao, $teste);

if($result){
    echo"finalizado com sucesso";
    header("Location: ./funcionario.php");
}else{
    echo"erro ao finalizar";
    header("Location: ./funcionario.php");
}
