<?php
require_once './cabecalho.php';
require_once './conecta.php';

function validarLogin($conexao,$usuario,$senha) { // função que faz a busca no banco do login e senha inserido na tela de login 

    $query  = "SELECT * FROM login WHERE login = '{$usuario}' AND senha = '{$senha}'";
    $result = mysqli_query($conexao,$query);
    $row =  mysqli_fetch_assoc($result);
    
    if($row['login']===$usuario && $row['senha']===$senha && $row['tipo']==="me" ||$row['tipo']==="ad"){
        criarComanda($conexao);
        header("Location: ./menu.php");

    } else if( $row['login'] === $usuario && $row['senha'] === $senha && $row['tipo'] === "fu"){
      
        header("Location: ./funcionario.php"); // redirecionando para a pagina do funcionario

    }else{?>
        <input hidden="true">
        <script>
         swal({         
                title: "Usuario ou senha incorreto",  
                type:"warning",
                text: "Tente novamente.",  
                timer: 9000,   
                showConfirmButton: true },
                function(){ window.location.href =" ./index.php";});
         </script>  
   <?php }
    
}



function listaItemMenu($conexao,$menu){ // função qu traz todos os itens de menu cadastrados
    $query  = "SELECT * from itemmenu"; //$menu será utilizado para no futuro trazer todos os itens de menu daquele menu em específico
    $result = mysqli_query($conexao,$query);
    return($result);
}

function formataNumero($valor){ // função para formatar os valores para duas casas decimais e acrescentar o R$
    return "R$ ".  number_format($valor,2, ".",",");
}

function criarComanda($conexao){
    // essa função cria uma nova tupla no banco ,define o total bruto como 0 e retorna o idda comanda
    $query ="insert into comanda values(0)";
    mysqli_query($conexao,$query);
    
    return mysql_insert_id($conexao);
    
}



//---------------- ANOTAÇÕES-------------------------
/*

 *     
     - Renato: alterei no banco o campo total bruto na tabela "Comanda", dei a permissão dele ser null     
     - Toda vez que um login de mesa for autenticado deve-se criar uma comanda
     - $tipo=$row['tipo']; futuramente terá que passar pela url o tipo de funcionario, para distinguir as permissoes
        header("Location: ./funcionario.php?tipo=$tipo");  pra que passar o tipo de usuario?
 * 
 * 
 * 
 * 
 *  */
