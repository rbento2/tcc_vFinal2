<?php require_once '../conecta.php';

function criarLogin($conexao,$login,$senha,$tipo){
    
    $sql="insert into login values('$login','$senha','$tipo')"; 
    $result_query = mysqli_query($conexao,$sql);
    if($result_query){
        $id = buscaLogin($conexao, $login);
        return $id; 
    }else{
        return FALSE;
    }
    
    
    
}

function criarFuncionario($conexao,$nome, $cargo, $turno,$login){
    $sql ="INSERT INTO funcionario VALUES(NULL,'$nome','$cargo','$turno','$login')";
    mysqli_query($conexao,$sql) or die("Erro ao criar o funcionario").mysql_error($conexao);
    
    return TRUE;
}

function buscaLogin($conexao,$login){
    
    $sql="select * from login where login ='$login'";
    $result = mysqli_query($conexao,$sql);
    $resultado= mysqli_fetch_assoc($result);
    return $resultado['login'];
}