<?php
require_once './conecta.php';

$idDaComanda=0;
$totalBruto=0;

function validarLogin($conexao,$usuario,$senha) { // função que faz a busca no banco do login e senha inserido na tela de login 
    $query  = "SELECT * FROM login WHERE login = '{$usuario}' AND senha = '{$senha}'";
    $result = mysqli_query($conexao,$query);
    $row =  mysqli_fetch_assoc($result);
       
    if($row['login']===$usuario && $row['senha']===$senha && $row['tipo']==="me" ||$row['tipo']==="ad"){
        
        $queryMesa = "SELECT m.idMesa FROM mesa as m INNER JOIN login l ON m.login = l.login WHERE m.login = '$usuario'"; 
        $resultMesa = mysqli_query($conexao, $queryMesa);
        $linha = mysqli_fetch_assoc($resultMesa);
        
           $idComanda= criarComanda($conexao,$linha['idMesa']);
           $_SESSION['comanda'] = $idComanda;
            header("Location: ./menu.php?comanda=$idComanda");
   
    
    /*  - Renato: alterei no banco o campo total bruto na tabela "Comanda", dei a permissão dele ser null     
        - Toda vez que um login de mesa for autenticado deve-se criar uma comanda */
        
    } else if( $row['login'] === $usuario && $row['senha'] === $senha && $row['tipo'] === "fu"){
       /* $tipo=$row['tipo']; futuramente terá que passar pela url o tipo de funcionario, para distinguir as permissoes
        header("Location: ./funcionario.php?tipo=$tipo");  pra que passar o tipo de usuario?*/
        header("Location: ./funcionario.php"); // redirecionando para a pagina do funcionario

    }else { ?>
        <script> 
            swal({         
            title: "Usuario ou senha incorreto",  
            type:"warning",
            text: "Tente novamente.",  
            timer: 3000,   
            showConfirmButton: true },
            function(){ window.location.href =" ./index.php";});
        </script>
    <?php }

}

function listaItemMenu($conexao,$menu){ // função qu traz todos os itens de menu cadastrados
    $query  = "SELECT * from itemmenu";
    $result = mysqli_query($conexao,$query);
    return($result);
}

function criarComanda($conexao,$mesa){
    // essa função cria uma nova tupla no banco ,define o total bruto como 0 e retorna o idda comanda
    echo$query ="INSERT INTO comanda VALUES(null,0,$mesa)"; 
    mysqli_query($conexao,$query) or die("erro ao inserir");
    $idDaComanda=  mysqli_insert_id($conexao);
    return $idDaComanda;
}      



function formataNumero($valor){ // função para formatar os valores para duas casas decimais e acrescentar o R$
    return "R$ ".  number_format($valor,2, ".",",");
}

////Teste de Funções//////////////////// Carla/////////////
function inserirPedidos($conexao, $comanda){
    // essa função cria uma nova tupla no banco ,define o total bruto como 0 e retorna o idda comanda
    $query ="insert into comanda values()";
    mysqli_query($conexao,$query);
    
    
}
function listaPedidos($conexao){
    // essa função cria uma nova tupla no banco ,define o total bruto como 0 e retorna o idda comanda
    
    $query ="SELECT ic.*, 
                    im.nomeItemMenu,
                    m.idMesa,
                    m.idGarcom
                FROM
                    itemcomanda ic
                INNER JOIN
                    itemmenu im 
                ON ic.FK_idItemMenu = im.idItemMenu
                LEFT JOIN
                    comanda c 
                ON ic.FK_idComanda = c.idComanda
                LEFT JOIN
                    mesa m 
                ON m.idMesa = c.idMesa";      
    $result=mysqli_query($conexao,$query) or die("erro ao listar itens de comanda");   
    return $result;
}
function finalizarItemComanda($conexao, $idItemComanda){
   echo $sql="UPDATE itemcomanda SET status='F' WHERE idItemComanda='{$idItemComanda}'";
    $result = mysqli_query($conexao, $sql);
    return $result;
}