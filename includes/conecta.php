<?php
$conexao= mysqli_connect("localhost","root","ch@bHIn") 
        or die("nao foi possivel realizar conexao com o banco de dados ".mysql_error($conexao)); // fun��o para realizar a conex�o com o BD, caso ocorra erro ir� retornar a mensagem de erro e o erro do mysql

mysqli_select_db($conexao,"easymenu") or die("Nao foi possivel encontrar o Banco de dados ". mysqli_error());// selecionando a base de dados