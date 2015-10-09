 <?php require_once './cabecalho.php';?>
  
        <form action="login.php"method="post">
             <br/><br/><br/><br/>
             <input type="text" name="login" id="login"  class="input" placeholder="Login"></input>
            <br/><br/>
            <input type="password" name="senha" id="senha" width="100" class="input" placeholder="Senha"></input> 
            <br/><br/>

            <br/><br/><br/><br/>
            
            <input type="submit" name="submit" id="logar" class=" btn-default botao" >
        </form>
 
        <?php
         require_once './rodape.php';
         ?>
  