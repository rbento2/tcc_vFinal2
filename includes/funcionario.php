<?php
require_once './cabecalho.php';
require_once './banco-funcao.php';
require_once './conecta.php';

?>  
<!-- Form para atualização dos pedidos pelo funcionario -->
<form id="funcionario" action="atualizaPedidos.php" method="post">
    <div class="panel-body" id="divListaPedidos">
    
       <div class="table-responsive" >
    <!--Tabela para pedidos novos -->
 <?php 
   $result =  listaPedidos($conexao);
   
   $totalPedidos = mysqli_num_rows($result);
   $retornaPedidos = [array(),array()];
   $a=0;
   

   while($row = mysqli_fetch_array($result)){
   $b=0;      
   
       
   if( $totalPedidos > 0) {
       if($row['status']!='F'){
        $retornaPedidos[$a][$b]=$row['idMesa'];
        $b++;
        $retornaPedidos[$a][$b] = $row['nomeItemMenu'];
        $b++;
        $retornaPedidos[$a][$b] = $row['quantidade'];
        $b++;
        $retornaPedidos[$a][$b] ='tempo de preparo - hora atual';
        $b++;
        $retornaPedidos[$a][$b]=$row['status'];
        $b++;
        $retornaPedidos[$a][$b]=$row['idItemComanda'];
        $a++;
       }
      }else{
        
        echo"Sem pedidos";
   
      } 
  // {echo'sem pedidos';}
    }?> 
 <thead>
 <div  id="asd">
 <table class="table table-bordered table-striped">
    <tr>
      <th class="ItemMenu">Mesa</th>
      <th class="ItemMenu">Item</th>
      <th class="ItemMenu">Quantidade</th>
      <th class="ItemMenu">Hora</th>
      <th class="ItemMenu">Status</th>
      <th class="ItemMenu">Acao</th>
    </tr>
    
       <tbody>
           
 
       <?php for ($a=0,$j=count($retornaPedidos);$a<$j;$a++)  {?>      
          <tr>
            <?php for($b=0,$m = (count($retornaPedidos[$a])-1);$b<$m;$b++){?>                 
              <td class="td-menu"><?php echo $retornaPedidos[$a][$b];?></td>     
                   
                 <?php }?>
                   
              <td class="td-menu"> <input  type="radio" class="rbo" name="optionsRadios" value="<?php echo $retornaPedidos[$a][5]?>"><?php echo $retornaPedidos[$a][5]?></td> 
                </tr>
       <?php }?>
      </table>
      </div>
    </thead>
   </tbody>  
    
 </div>

     </div>  
    <br/><br/>
    
    <span>
        <button name="Finalizar" id="Finalizar" type="submit" class="btn btn-success" value="finalizar">Finalizar</button>&nbsp;&nbsp;

       <button type="button" class="btn btn-danger" value="cancelar">Cancelar</button> &nbsp;&nbsp;
       <!--Acho que eu deveria colocar no value o id da tabela né? -->
    </span>   
       
    

    
</form>


    <?php require_once './rodape.php';