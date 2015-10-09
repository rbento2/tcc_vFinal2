<?php
require_once './cabecalho.php';
require_once './banco-funcao.php';
require_once './conecta.php';

//para agrupar pagamentos?
?> 

<!--Tela de pagamentos onde o susário vai escolher a opção-->

<form id="pagamentos" action="realizarPagamentos.php" method="post"> 

    <button type="button" class="btn btn-primary" value="enviar">Enviar</button>     
</form>

