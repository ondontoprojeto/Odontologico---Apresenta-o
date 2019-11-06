<?php

	include_once 'conexao.php';

	$id_pessoa = $_POST['id_pessoa'];
	$id_dentista = $_POST['id_dentista'];
	$id_tipoconsulta = $_POST['id_tipoconsulta'];
	$descricao = $_POST['descricao'];
	
	$data = date('Y-m-d');
	$hora = date("H:i:s"); 

    $sql = "INSERT INTO atendimento VALUES(null, '{$data}', '{$hora}','{$descricao}')"; 

	if (mysqli_query($con, $sql)) {
		$last_id = mysqli_insert_id($con);
		//echo "New record created successfully. Last inserted ID is: " . $last_id;
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}

	//$msg = (mysqli_query($con, $sql)) ? "Gravado com sucesso" : "Erro ao gravar";
	//$last_id = mysqli_insert_id($con);

    $sql = "INSERT INTO pessoa_atendimento VALUES('{$last_id}', '{$id_pessoa}', '{$id_dentista}','{$id_tipoconsulta}')"; 

	//$msg = (mysqli_query($con, $sql)) ? "Gravado com sucesso" : "Erro ao gravar";
	if (mysqli_query($con, $sql)) {
		//$last_id = mysqli_insert_id($con);
		//echo "New record created successfully. Last inserted ID is: " . $last_id;
		$msg = "Gravado com sucesso";
		header("location:consulta.php?idPessoa={$id_pessoa}&msg={$msg}");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}

?>