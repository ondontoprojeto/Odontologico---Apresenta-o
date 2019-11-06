<?php

	include_once 'conexao.php';

	//
	$nome = $_POST['nome'];
	
    $sql = "INSERT INTO procedimento_tipo VALUES(null,'{$nome}')"; 

	// $inserir = mysqli_query($con, $sql);

	$msg = (mysqli_query($con, $sql)) ? "Gravado com sucesso" : "Erro ao gravar";

	header("location:msgProcedimento.php?msg=".$msg);
?>