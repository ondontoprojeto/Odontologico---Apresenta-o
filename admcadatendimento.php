<?php

	include_once 'conexao.php';

	//
	$atendimentonome = $_POST['atendimentonome'];	


    $sql = "INSERT INTO atendimento_tipo VALUES(null,'{$atendimentonome}')"; 

	// $inserir = mysqli_query($con, $sql);

	$msg = (mysqli_query($con, $sql)) ? "Gravado com sucesso" : "Erro ao gravar";

	header("location:msgAtendimentoAdm.php?msg=".$msg);
?>