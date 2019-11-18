<!DOCTYPE html>
<html>
	<head>
		<title>Odontologico - Agendamento</title>
		<meta charset="utf-8">			
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="styleHeader.css"> 
        <script>
            function excluir(id){
                if(confirm('Deseja realmente Cancelar esse Agendamento?')){
                    location.href = 'deletarAgenda.php?id=' + id;   
                }
            }
        </script>
	</head>
<body>
	<?php include 'header.php'?>
   <?php 
            include_once 'conexao.php';

            $sql = "SELECT NOW() As hoje";
            $busca = mysqli_query($con, $sql);
            if(mysqli_num_rows($busca) == 1){
                $array = mysqli_fetch_array($busca);

                $hoje1 = substr($array['hoje'], 0, -9);

                $hoje = explode('-', $hoje1);
                $newHoje = $hoje[2] . "-" . $hoje[1]. "-" . $hoje[0];
            };

        ?>
    <h1 class = "text-center mb-3">Agendamento de Pacientes (<?php echo $newHoje?>)</h1>
        	<div class = "pl-5 pr-5">
                <span class = "d-flex d-inline-flex mb-2">
                        <a href="agendaTodos.php"><button class="btn btn-danger btn-md mr-3 ml-1">Exibir Todos</button></a>

                    <button type="button" class="btn btn-primary btn-md ml-1" data-toggle="modal" data-target="#modal1">Marcar Consulta</button>
                    <input type="button" class ="btn btn-dark ml-5" onclick="window.print();" value="Imprimir">
                    <!--Modal Formulário de Agendamento -->
                    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title text-primary" id="modalTitle">Cadastro de Consultas</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="front-left">Dados da Consulta</h5>
                                    <form class = "form-group mt-2" action="cadastrarAgenda.php" method="post"> 
                                       <div class="form-group">
                                            <label for="nome">Paciente:</label>
                                            <select type="text" class="form-control" id="nome" placeholder="" name="paciente_id">
                                            <?php
                                                include_once 'conexao.php';
                                                $sql = "SELECT * FROM paciente ORDER BY nome ASC";
                                                $busca = mysqli_query($con, $sql);

                                                while($array = mysqli_fetch_array($busca)){
                                                    $id     = $array['id'];
                                                    $nome   = $array['nome'];
                                                    ?>
                                                   <option value='<?php echo $id ?>'><?php echo $nome ?></option> 
                                            <?php } ?>
                                            </select>
                                        </div>   
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="data">Data:</label>
                                                <input type="date" class="form-control" id="data" placeholder="data" name="data">
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <label for="hora">Hora:</label>
                                                <input type="time" class="form-control" id="hora" placeholder="hora" name="hora">
                                            </div>
                                        </div>                                                                               
                                        <!-- AQUI É A LISTA DE SELEÇÃO DE DENTISTA-->
                                        <div class="form-group">
                                            <label>Nome Dentista:</label>
                                            <select class="form-control" name="dentista_id" id="nomedentista" placeholder="" name="nomedentista">
                                                <?php
                                                   include_once 'conexao.php';
                                                    $sql = "SELECT * FROM dentista ORDER BY nome ASC";
                                                    $busca = mysqli_query($con, $sql);

                                                while($array = mysqli_fetch_array($busca)){
                                                    $id     = $array['id'];
                                                    $nome   = $array['nome'];
                                                    ?>
                                                   <option value='<?php echo $id ?>'><?php echo $nome ?></option> 
                                                <?php } ?>                          
                                            </select>
                                        </div>

                                        <div class="row">
                                        <div class="form-group col-md-12">
                                              
                                            </div> 
                                        </div>
                                        <div class="form-group">
                                            <label for="obs">Descrição:</label>
                                            <textarea type="text" class="form-control" id="descricao" placeholder="" name = "descricao"></textarea>
                                        </div>  
                                        <div class = "d-flex justify-content-around">
                                            <div class="form-check form-check-inline">  
                                                <input class="form-check-input" type="radio" name="gender" value="Agendado">Agendar<br>
                                            </div>                                 
                                            <div class="form-check form-check-inline">  
                                                <input class="form-check-input" type="radio" name="gender" value="Confirmado"> Confirmar<br>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="Cancelado"> Cancelar<br>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary float-right mt-3" value = "Cadastrar">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                </span>

                <div class = "overflow-auto ml-1 mr-1" style = "max-height: 520px">
                    <table class="table w-100 mt-4 table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nome do Paciente</th>                               
                                <th scope="col">Nome do Dentista</th> 
                                <th scope="col">Data</th>
                                <th scope="col">Hora</th>                            
                                <th scope = "col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                include_once 'conexao.php';
                            $sql = "SELECT 
                                    a.id AS atendimento_id,
                                    p.nome AS paciente_nome, 
                                    d.nome AS dentista_nome,
                                    a.data,
                                    a.hora as atendimento_hora
                                    FROM atendimento a, paciente p, dentista d
                                    WHERE 
                                    a.paciente_id = p.id
                                    AND
                                    a.dentista_id = d.id
                                    AND
                                    data = left(now(),10) ORDER BY data, hora";
                                $busca = mysqli_query($con, $sql);

                                while($array = mysqli_fetch_array($busca)){
                                    $atendimento_id = $array['atendimento_id'];
                                    $paciente_nome = $array['paciente_nome'];
                                    $dentista_nome = $array['dentista_nome'];
                                    $data = $array['data'];
                                    $hora = substr($array['atendimento_hora'], 0 , -3);

                                    $data = explode('-', $data);
                                    $newdata = $data[2] . "-" . $data[1]. "-" . $data[0];
                            ?>
                                <tr>                                    
                                    <td><?php echo $paciente_nome?></td>                                   
                                    <td><?php echo $dentista_nome?></td>
                                    <td><?php echo $newdata?></td>
                                    <td><?php echo $hora?></td>
                                    <td class = "d-flex justify-content-around">
                                        <a class="btn btn-success btn-sm" href="procedimento.php?atendimento_id=<?php echo $atendimento_id ?>" role="button">
                                            <i class="fa fa-medkit mr-2" aria-hidden="true"></i>
                                            Procedimentos
                                        </a>               
                                        <a class="btn btn-warning btn-sm"  style="color:#fff" href="editaragenda.php?id=<?php echo $atendimento_id?>" role="button">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            Editar
                                        </a>  
                                        <a class="btn btn-danger btn-sm"  style="color:#fff" onclick="excluir(<?php echo $array['atendimento_id']?>)" role="button">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            Cancelar
                                        </a>
                                    </td>
                                </tr>
                            <?php
                        };?>                    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>     
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


