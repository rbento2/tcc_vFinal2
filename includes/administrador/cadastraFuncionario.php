<?php

    // chama o cabeçalho    
    require_once './cabecalho.php';
    // chama o menu superior (aonde fica o ligin e etc)  
    require_once './menuSuperior.php';
    //chamada para o menu lateral
    require_once 'menu.php';
    ?>
<form id="cadastraFunc" action="./cadFuncionario.php" method="post">
    
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Usu&aacute;rio <br/> 
                        <small>&nbsp;&nbsp;&nbsp;&nbsp;Cadastro de novos usu&aacute;rios</small>
                    </h1>
                </div>
            </div>
                <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        <br/>
<!--        <div class=" panel panel-default">  -->
        <div class="panel panel-default panel-body"> 
        <table class="table-condensed">
            <tr>
                <td width="20%">Nome</td>
                <td width="30%" align="left"><input type="text" class="form-control" name="nome" required id="nome" placeholder="Nome do funcionario"/></td>
            </tr>
            <tr>
                <td width="20%">Cargo</td>
                <td width="30%"> 
                    <select name="cargo" id="cargo" class="form-control" required >
                        <option value="" selected=""> Selecione </option>   
                        <option value="Garcom"> Gar&ccedil;om </option>   
                        <option value="Cozinheiro"> Cozinheiro </option>   
                        <option value="Administrador"> Admimnistrador</option>   
                    </select>
                </td>
            </tr>
            <tr>
                <td>Turno</td>
                <td>
                    <select name="turno" id="turno" class="form-control" required>
                        <option value="" selected="" >Selecione</option>
                        <option value="M" class="">Manh&atilde;</option>
                        <option value="T">Tarde</option>
                        <option value="N">Noite</option>
                    </select>
                </td>
            </tr>
        </table>
        </div>

        <div class="panel panel-default panel-body">
            <table class="table-condensed">
                <tr>
                    <td width="20%">Login</td>
                    <td width="30%"><input required type="text" class="form-control" name="login" id="login" placeholder="Login"/></td>
                </tr>
                <tr>
                    <td width="20%">Permiss&atilde;o</td>
                        <td width="30%"> 
                            <select name="tipo" id="tipo" class="form-control" required >
                                <option value="" selected=""> Selecione </option>   
                                <option value="fu"> Funcionario </option>      
                                <option value="adm"> Administrador</option>   
                            </select>
                    </td>
                </tr>
                <tr>
                    <td>Senha</td>
                    <td><input type="password" required class="form-control" name="senha" id="senha" /></td>
                </tr>
                <tr>
                    <td>Confirme a senha</td>
                    <td><input type="password" required class="form-control" name="confSenha" id="confSenha" /></td>
                </tr>
                <tr> 
                    
                    <td> <br/><br/><br/>
                        <input type="submit" id="submit" class=" btn-success form-control"/>
                    </td> 
                    <td> <br/><br/><br/>
                        <input type="reset" id="limpar" class=" btn-warning form-control" value="Limpar"/>
                    </td> 
                </tr>
            </table>            
        </div>
 
    </div>  
        <!-- /#page-wrapper -->
</form>
<?php require_once './rodape.php';?>
