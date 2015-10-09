<?php
//require_once './conecta.php';
require_once './cabecalho.php';

$idDaComanda=0;
$totalBruto=0;

function validarLogin($conexao,$usuario,$senha) { // função que faz a busca no banco do login e senha inserido na tela de login 
    $query  = "SELECT * FROM login WHERE login = '{$usuario}' AND senha = '{$senha}'";
    $result = mysqli_query($conexao,$query) or die("erro ao buscar o login e senha");
    $row =  mysqli_fetch_assoc($result);
       
    if($row['login']===$usuario && $row['senha']===$senha && $row['tipo']==="me" ){
        
        $queryMesa = "SELECT m.idMesa FROM mesa as m INNER JOIN login l ON m.login = l.login WHERE m.login = '$usuario'"; 
        $resultMesa = mysqli_query($conexao, $queryMesa) or die("erro ao buscar o id da mesa");
        $linha = mysqli_fetch_assoc($resultMesa);
        $idComanda= criarComanda($conexao,$linha['idMesa']);
        session_start();
           $_session['usuario']=$row['login'];
           $_SESSION['comanda'] = $idComanda;
            header("Location: ./menu.php");
   //teste 2

        
    } else if( $row['login'] === $usuario && $row['senha'] === $senha && $row['tipo'] === "fu"){
       /* $tipo=$row['tipo']; futuramente terá que passar pela url o tipo de funcionario, para distinguir as permissoes
        header("Location: ./funcionario.php?tipo=$tipo");  pra que passar o tipo de usuario?*/
        header("Location: ./funcionario.php"); // redirecionando para a pagina do funcionario

    }else if($row['login']===$usuario && $row['senha']===$senha && $row['tipo']==="adm"){ 
        header("Location: ../includes/administrador/index.php"); // redirecionando para a pagina do funcionario
        
    }else{
        msg("warning","Usuario ou senha incorreto".$row['login'].$row['senha'].$row['tipo'], "Tente novamente."," ./index.php");
    }

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
function inserirPedidos($conexao,$qtd,$comanda){
    // essa função cria uma nova tupla no banco ,define o total bruto como 0 e retorna o idda comanda
    $query ="insert into itemcomanda values(null,$qtd,current_timestamp,$comanda,1)"; 
    $result =mysqli_query($conexao,$query);
    if($result)
        return true;
    else
        return false;
    
}

function msg($tipo, $titulo, $texto,$local){
    // mensagens que redirecionam
 if(isset($local)){?>
   <script> 
            swal({         
            title:"<?php echo $titulo?>",  
            type: "<?php echo $tipo?>",
            text: "<?php echo $texto?>",  
            timer: 3000,   
            showConfirmButton: true },
            function(){ window.location.href ="<?php echo $local ?>";});
   </script>
 <?php }else{ /*mensagens que não redirecionam*/ ?>
     
   <script> 
            swal({         
            title:"<?php echo $titulo?>",  
            type: "<?php echo $tipo?>",
            text: "<?php echo $texto?>",  
            timer: 3000});
   </script>
   
   
<?php } 
}