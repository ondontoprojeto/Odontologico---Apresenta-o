<?php

	include_once 'conexao.php';

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$cpf = $_POST['cpf'];
	$rg = $_POST['rg'];
	$telefone = $_POST['telefone'];
	$celular = $_POST['celular'];
	$cep = $_POST['cep'];
	$endereco = $_POST['endereco'];
	$bairro = $_POST['bairro'];
	$nascimento = $_POST['nascimento'];
	$cidade = $_POST['cidade'];
	$uf = $_POST['uf'];
	//Anaminésia
	$doencabase = $_POST['doencabase'];
	$alergia = $_POST['alergia'];
	$medicamentos = $_POST['medicamentos'];
	$cirurgia = $_POST['cirurgia'];
	$internacoes = $_POST['internacoes'];
	$pa = $_POST['pa'];
	$queixaprinc = $_POST['queixaprinc'];
	//Anaminésia	
	$situacaoficha = $_POST['situacaoficha'];
	$orcamento = $_POST['orcamento'];
	$complemento = $_POST['complemento'];

	
		
	

    $sql = "INSERT INTO paciente VALUES(null,'{$nome}','{$email}','{$cpf}'  ,  '{$rg}','{$telefone}','{$celular}','{$cep}','{$endereco}','{$bairro}','{$nascimento}', '{$cidade}','{$uf}','{$doencabase}','{$alergia}','{$medicamentos}','{$cirurgia}','{$internacoes}','{$pa}','{$queixaprinc}' , '{$situacaoficha}' , '{$orcamento}' , '{$complemento}')";

	$msg = (mysqli_query($con, $sql)) ? "Cadastrado com sucesso" : "Erro ao Cadastrar";

	header("location:msg.php?msg=".$msg);
?>