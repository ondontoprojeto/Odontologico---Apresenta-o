<!DOCTYPE html>
<html>
	<head>
		<title>Odonto - Inicio</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="styleHome.css">
		<link rel="stylesheet" type="text/css" href="styleHeader.css">
</head>
<body>
<?php include "header.php"?>
 <h1 class = "text-center mb-3">Comparativo de Consultas (Totalizado)</h1>
<div class = "row">
	<div class = "col"></div>
    <div class = "col-lg-10 mt-4">
		<div class = "border">
			<table class = "table border">
			  	<tr class = "bg-light">
			  		<th><i class = "fa fa-user mr-2" aria-hidden="true"></i>Consultas</th>
			  	</tr>
			</table>
			<div class="row">
				<div class = "col-md-4 d-none d-lg-block w-100">
					<div class="bd-highlight ml-2">
						<?php
							include_once 'conexao.php';
	                        $sql = "SELECT COUNT(situacao) AS confirmados FROM atendimento WHERE situacao = 'Confirmado'";
	                        $busca = mysqli_query($con, $sql);
	                        if(mysqli_num_rows($busca) == 1){
								$row = mysqli_fetch_array($busca);
								$confirmado = $row['confirmados'];
						?>
						<div id = "real" class="d-inline-flex bg-success border border-dark mb-1 justify-content-center text-white">
							 <i class = "fa fa-users fa-2x m-2" aria-hidden="true"></i>
                            <span class = "estudos text-white mt-1">
                                <h6 class = "text-center">Confirmados</h6>
                                <h6 class = "text-center"><b><?php echo $row['confirmados']?></b></h6>
                            </span>
						</div><br>
						<?php } ?>


						<?php
							include_once 'conexao.php';
	                        $sql = "SELECT COUNT(situacao) AS agendado FROM atendimento";
	                        $busca = mysqli_query($con, $sql);
	                        if(mysqli_num_rows($busca) == 1){
								$array = mysqli_fetch_array($busca);
								$agendado = $array['agendado'];
						?>
						<div id = "agen" class="d-inline-flex bg-primary border border-dark mb-1 justify-content-center text-white">
							<i class = "fa fa-calendar fa-2x m-2" aria-hidden="true"></i>
                            <span class = "estudos">
                                <h6 class = "text-center pt-1">Agendados</h6>
                                <h6 class = "text-center"><b><?php echo $array['agendado']?></b></h6>
                            </span>
						</div><br>
						<?php }?>

						<?php
							include_once 'conexao.php';
	                        $sql = "SELECT COUNT(situacao) AS cancelado FROM atendimento WHERE situacao = 'Cancelado'";
	                        $busca = mysqli_query($con, $sql);
	                        if(mysqli_num_rows($busca) == 1){
								$rows = mysqli_fetch_array($busca);
								$cancelado = $rows['cancelado'];
						?>
						<div id = "canc" class="d-inline-flex bg-danger border border-dark mb-1 justify-content-center text-white">
							<i class = "fa fa-ban fa-2x m-2" aria-hidden="true"></i>
                            <span class = "estudos">
                                <h6 class = "text-center pt-1">Cancelados</h6>
                                <h6 class = "text-center"><b><?php echo $rows['cancelado']?></b></h6>
                            </span>
						</div>
						<?php } ?>

					</div>
				</div>
				<div class = "col-md-7 ml-2 w-50">

					<?php 
						include_once 'conexao.php';

						if($confirmado == 0){
							$porConfirm = 0;
						} else {
							$porConfirm = $confirmado / $agendado * 100;
						};

						if($agendado == 0) {
							$porCancelado = 0;
						} else {
							$porCancelado = $cancelado / $agendado * 100;
						};
					?>
					<p class="text-center mt-2">
                    	<strong>Comparativo de Consultas</strong>
                    </p>
					<div class="progress-group mt-2">
						<b>Confirmado</b>
						<span class="float-right"><b><?php echo $confirmado?></b>/ <b><?php  echo $agendado ?></b></span>
						<div class="progress progress-sm">
							<div class="progress-bar bg-success" style="width: <?php echo $porConfirm?>%"></div>
						</div>
					</div>
					<div class="progress-group mt-2">
						<b>Agendado</b>
						<span class="float-right"><b><?php echo $agendado?></b></span>
						<div class="progress progress-sm">
							<div class="progress-bar bg-primary" style="width: 100%"></div>
						</div>
					</div>
					<div class="progress-group mt-2">
						<b>Cancelado</b>
						<span class="float-right"><b><?php echo $cancelado?></b>/ <b><?php echo $agendado?></b></span>
						<div class="progress progress-sm">
							<div class="progress-bar bg-danger" style="width: <?php echo $porCancelado?>%"></div>
						</div>
					</div>
				</div>	
			</div>				
		</div>
	</div>
	<div class = "col"></div>
</div>

<div class = "row">
	<div class = "col"></div>
     <div class = "col-lg-10 mt-5 overflow-auto" style = "max-height: 400px">
		    	<table class="table border table-hover">
		    		<thead>
		    			<tr class = "bg-light">
		    				<th colspan = "4" ><i class="fa fa-address-book-o mr-2" aria-hidden="true"></i>Próximos Pacientes</th>
		    			</tr>
		    		</thead>
					<thead>
						<tr class = "bg-primary text-white">
							<th scope="col">Nome</th>
							<th class = "text-center" scope = "col">Data</th>
							<th class = "text-center" scope="col">Horário</th>
							<th class = "text-center" scope="col">Situação</th>
						</tr>
					</thead>
					<tbody>
							<?php
								include_once 'conexao.php';
	                            $sql = "SELECT
										a.id AS atendimento_id, 
									    a.hora AS atendimento_hora,
									    a.data AS atendimento_data,
									    p.nome AS paciente_nome,
									    a.situacao AS situacao_paciente
									    FROM paciente p, atendimento a 
									    WHERE 
									    p.id = a.paciente_id ORDER BY atendimento_data, atendimento_hora ASC";
                                $busca = mysqli_query($con, $sql);
                                while($array = mysqli_fetch_array($busca)){
                                	$nome = $array['paciente_nome'];
                                	$horario = substr($array['atendimento_hora'], 0, -3);
                                	$situacao = $array['situacao_paciente'];
                                	$data1 = $array['atendimento_data'];

                                	$data = explode('-', $data1);
                                	$newData = $data[2] . "-" . $data[1]. "-" . $data[0];

                            ?>
                        <tr>
							<td><?php echo $nome ?></td>
							<td class = "text-center"><?php echo $newData?></td>
							<td class = "text-center"><?php echo $horario?></td>
							<td class = "text-center"><b><?php echo $situacao?></b></td>
						</tr>
					<?php }?>
					</tbody>
				</table>
		    	<span>
		    		<?php
					include_once 'conexao.php';
                    $sql = "SELECT
							a.id AS atendimento_id, 
						    a.hora AS atendimento_hora,
						    COUNT(p.nome) AS paciente_nome,
						    a.situacao AS situacao_paciente
						    FROM paciente p, atendimento a 
						    WHERE 
						    p.id = a.paciente_id";
                    $busca = mysqli_query($con, $sql);
                    while($array = mysqli_fetch_array($busca)){
                    	$quantidade = $array['paciente_nome'];
                    };
                    ?>
					<input class = "text-center" type = "text" value = "<?php echo $quantidade?> Paciente(s)" disabled>

				</span>
				<span>
					<a href= "agenda.php"><input class = "btn btn-primary float-right" type = "submit" value = "Visualizar Agenda"></a>
				</span>
			</div>
			<div class = "col"></div>
		</div>
	<div class = "col"></div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>	
</html>