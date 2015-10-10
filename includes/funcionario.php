<?php
require_once './cabecalho.php';
require_once './banco-funcao.php';
?>


<?php
//   echo("funcionario");
//   print date('m - Y');?>


<!-- Form para atualização dos pedidos pelo funcionario -->

<form id="atualizarPedidosFuncionario" action="" method="post">
    <!--Tabela para pedidos novos -->
   
        
<div class="panel-body" id="divListaPedidos">
</div>
<div class="panel-body" id="divMenu">  
</div>
    

       <div btns_Cenrais>
           <bottom>
       <input type = "submit" value = "Aceitar" name = "aceitarPedido" class="botaoAceita" /> &nbsp;&nbsp;
       <input type = "submit" value = "Finalizar" name = "finalizarPedido" class="botaoFinaliza" />  &nbsp;&nbsp; 
       <input type = "button" value = "Cancelar" id= "cancelarPedido" name="cancelarPedido"  class="botaoCancela" />   
            </bottom>
       </div>
   </form>


