<?php

	include_once 'conexao.php';

    
	$paciente_id   =  $_POST['paciente_id'];	
	$dentista_id   =  $_POST['dentista_id'];	
	$descricao     =  $_POST['descricao'];	
	$data          =  $_POST['data'];	
	$hora          =  $_POST['hora'];
	$situacao      =  $_POST['gender'];

    /*
	$nomeconsulta =  $_POST['nomeconsulta'];	
	$dia =  $_POST['dia'];
	$hora =  $_POST['hora'];
	$descricao =  $_POST['descricao'];
	$nomedentista =  $_POST['nomedentista'];
    */

/*	$consulta = "SELECT * FROM paciente WHERE nome = '$nome'";
    $buscar = mysqli_query($con, $consulta);

    while($array = mysqli_fetch_array($buscar)){
    	$idPaciente = $array['paciente_id'];
        $nome = $array['nome'];
    };
    */

   	$sql = "INSERT INTO atendimento VALUES(null, '{$paciente_id}', '{$dentista_id}', '{$data}', '{$descricao}', '{$hora}', '{$situacao}')"; 
   	echo $sql;
	$msg = (mysqli_query($con, $sql)) ? "Gravado com sucesso" : "Erro ao gravar";

	header("location:msgAtendimento.php?msg=".$msg);
?>