<?php

	include_once 'conexao.php';

	$nomedentista = $_POST['nomedentista'];
	$cro = $_POST['cro']; 
	
	

    $sql = "INSERT INTO dentista VALUES(null,'{$nomedentista}','{$cro}')"; 

	// $inserir = mysqli_query($con, $sql);

	$msg = (mysqli_query($con, $sql)) ? "Gravado com sucesso" : "Erro ao gravar";

	header("location:msgDentista.php?msg=".$msg);
?>