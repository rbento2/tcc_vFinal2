
<?php
require_once './cabecalho.php';
require_once './banco-funcao.php';


        
//$tipo = $_REQUEST['tipo']; pega o tipo de usuario
$tipomenu=""; //= $_REQUEST['menu']; // futuramente pegara o tipo de menu

if($tipomenu==""){
    $menu=$tipomenu;
}
else{
    $menu="defaut";
}?>

<form id="menu" action="pedido.php" method="post">
    
<div class="panel-body" id="divImagem">

</div>

<div class="panel-body" id="divMenu">
   <?php  $result=listaItemMenu($conexao,$menu);
   $prato = array(array(),array());
   $bebida = array(array(),array());
   $j=0;$a=0;
   
   while($row = mysqli_fetch_array($result)){
     $i=0;$b=0;
     
      if($row['tipo']=='b'){
        $bebida[$a][$b]=$row['nomeItemMenu'];
        $b++;
        $bebida[$a][$b]=$row['preco'];
        $b++;
        $bebida[$a][$b] = $row['imagem'];
        $b++;
        $bebida[$a][$b] = $row['idItemMenu'];
        $a++;
        
      }else{
          
        $prato[$j][$i]=$row['nomeItemMenu'];
        $i++;
        $prato[$j][$i]=$row['preco'];
        $i++;
        $prato[$j][$i]=$row['imagem'];
        $i++; 
        $prato[$j][$i]=$row['idItemMenu'];
        $j++;
        
      } 
   }?>
    
    <table class="tabelaMenu table">
      <tr>Bebida</tr>
       <?php for($m=0;$m<count($bebida);$m++){?>
        <tr class="form-control-renato">
            <input type="hidden" value="<?php echo $bebida[$m][2];?>"/>
            <input type="text" name="itemMenuBebida[]"  hidden value="<?php echo $bebida[$m][3];?>"/>
            
           
            <?php for($b=0;$b<=1;$b++){ ?>
                  <td class="td-menu"> <?php echo($b==1?formataNumero($bebida[$m][$b]):$bebida[$m][$b]);?></td>
            <?php } ?>
                  <td class="td-menu"><input type="number" class="ItemMenu input" name="quantidadeBebida[]" min="0" value="0"/></td>
            
        </tr>
       <?php } ?>
        
    </table>
    
    <table class="tabelaMenu table">
      <tr>Prato</tr>
       <?php for($r=0;$r<count($prato);$r++){?>
        <tr class="form-control-renato">
            <input type="hidden" value="<?php echo $bebida[$r][2];?>"/>
            <input type="hidden"  name="itemMenuPrato[]" value="<?php echo $bebida[$r][3];?>"/>
           
                <?php for($e=0;$e<=1;$e++){ ?>
                <td class="td-menu"> <?php echo($e==1?formataNumero($prato[$r][$e]):$prato[$r][$e]);?> </td>
                <?php } ?>
                <td class="td-menu"><input type="number" class="ItemMenu input" name="quantidadePrato[]" min="0" value="0"/></td>
        </tr>
       <?php } ?>
    </table>
    
</div>
    
    <input type="submit" class="botao btn-primary" id="pedir" value="Pedir"/>
</form>

<!--
<nav>
  <ul class="pager">
    <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Older</a></li>
    <li class="next"><a href="#">Newer <span aria-hidden="true">&rarr;</span></a></li>
  </ul>
</nav> --> <!-- Este código é para redirecionar as páginas.
<?php require_once './rodape.php';


/*
       criar um input e usar o id do item com id do  proprio input
  */