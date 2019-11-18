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
		<?php include 'header.php';?>
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

		<h1 class = "text-center">Visualizador (<?php echo $newHoje?>)</h1>
		<!-- SESSÃO DO SISTEMA WEB -->
		
		<!--Área de verificação de Consultas-->
		<div class = "row">
			<div class = "col"></div>
		    <div class = "col-lg-5 mt-4">
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
			                        $sql = "SELECT COUNT(situacao) AS confirmados FROM atendimento WHERE situacao = 'Confirmado' AND data = left(now(), 10)";
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
			                        $sql = "SELECT COUNT(situacao) AS agendado FROM atendimento WHERE data = left(now(), 10)";
			                        $busca = mysqli_query($con, $sql);
			                        if(mysqli_num_rows($busca) == 1){
										$array = mysqli_fetch_array($busca);
										$agendado = $array['agendado'];
								?>
								<div id = "agen" class="d-inline-flex bg-primary border border-dark mb-1 justify-content-center text-white">
									<i class = "fa fa-calendar fa-2x m-2" aria-hidden="true"></i>
		                            <span class = "estudos text-white">
		                                <h6 class = "text-center pt-1">Agendados</h6>
		                                <h6 class = "text-center text-white"><b><?php echo $array['agendado']?></b></h6>
		                            </span>
								</div><br>
								<?php }?>

								<?php
									include_once 'conexao.php';
			                        $sql = "SELECT COUNT(situacao) AS cancelado FROM atendimento WHERE situacao = 'Cancelado' AND data = left(now(), 10)";
			                        $busca = mysqli_query($con, $sql);
			                        if(mysqli_num_rows($busca) == 1){
										$rows = mysqli_fetch_array($busca);
										$cancelado = $rows['cancelado'];
;								?>
								<div id = "canc" class="d-inline-flex bg-danger border border-dark mb-1 justify-content-center">
									<i class = "fa fa-ban fa-2x m-2 text-white" aria-hidden="true"></i>
		                            <span class = "estudos">
		                                <h6 class = "text-center text-white pt-1">Cancelados</h6>
		                                <h6 class = "text-center text-white"><b><?php echo $rows['cancelado']?></b></h6>
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
		                    	<a class = "text-dark" href="comparativo.php"><strong>Comparativo de Consultas</strong></a>
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

		<!-- Área de visualização de próximos pacientes -->

		    <div class = "col-lg-5 mt-4 overflow-auto" style = "max-height: 320px">
		    	<table class="table border table-hover">
		    		<thead>
		    			<tr class = "bg-light">
		    				<th colspan = "3" ><i class="fa fa-address-book-o mr-2" aria-hidden="true"></i>Próximos Pacientes</th>
		    			</tr>
		    		</thead>
					<thead>
						<tr class = "bg-primary text-white">
							<th scope="col">Nome</th>
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
									    p.nome AS paciente_nome,
									    a.situacao AS situacao_paciente
									    FROM paciente p, atendimento a 
									    WHERE 
									    p.id = a.paciente_id
									    AND
									    data = left(now(),10) ORDER BY atendimento_hora ASC";
                                $busca = mysqli_query($con, $sql);
                                while($array = mysqli_fetch_array($busca)){
                                	$nome = $array['paciente_nome'];
                                	$horario = substr($array['atendimento_hora'], 0, -3);
                                	$situacao = $array['situacao_paciente']

                            ?>
                        <tr>
							<td><?php echo $nome ?></td>
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
						    p.id = a.paciente_id
						    AND
						    data = left(now(),10)";
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

		<!-- Visualização de Aniversariantes do mês -->

		<div class="row">
			<div class = "col"></div>
			<div class = "col-lg-3 mt-5 overflow-auto" style = "max-height: 280px">
				<table class="table table-hover border">
					<thead>
						<tr class = "bg-light">
							<th class = "text-center" colspan = "3"> <i class="fa fa-birthday-cake mr-2" aria-hidden="true"></i>Aniversariantes do mês</th>
						</tr>
					</thead>
					<thead>
						<tr>
							<th scope="col">Nome</th>
							<th>Data</th>
							<th class = "text-center" scope="col">Contato</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php
							include_once 'conexao.php';
                            $sql = "SELECT * FROM paciente WHERE MONTH(nascimento) = Right(left(NOW(),7),2)";
                                $busca = mysqli_query($con, $sql);

                                while($array = mysqli_fetch_array($busca)){
                                $nascimento = $array['nascimento'];
                                $dtNasci = explode('-', $nascimento);
                                $datadeNascimento = $dtNasci[2] . "-" . $dtNasci[1]. "-" . $dtNasci[0];
                            ?>
                            <tr>
                                <td><?php echo $array['nome']?></td>
                                <td><?php echo $datadeNascimento?></td>          
                                <td class = "text-center"><?php echo $array['celular']?></td>
                            </tr>
                        <?php };?>
						</tr>
					</tbody>
				</table>
			</div>

		<!-- Visualização de consolidado Financeiro -->

			<div class="col-lg-4 mt-5">
		    	<table class=" table border w-100">
		    		<thead>
					  	<tr class = "bg-light">
					  		<th class = "text-center"><i class="fa fa-money mr-2" aria-hidden="true" colspan = "1"></i>Consolidado Financeiro</th>
					  	</tr>
				  	</thead>
				  	<tbody>
				  		<?php
								include_once 'conexao.php';
	                            $sql = "SELECT SUM(p.valor) As soma, a.data AS data FROM procedimento p , atendimento a WHERE a.id = p.atendimento_id AND data = left(NOW(),10)";
                                $busca = mysqli_query($con, $sql);
                                while($array = mysqli_fetch_array($busca)){
                                	$soma = $array['soma'];
                            ?>
						<tr>
							<td class = "d-inline-flex border w-100">
								<i class="fa fa-arrow-up text-white border fa-5x bg-success" aria-hidden="true"></i>
								<span class = "consolidado">
									<h6 class = "pt-2">Consultas Recebidas</h6>
									<a href="consolidado.php"><p class = "text-center text-success">R$ <?php echo $soma?>,00</p></a>
								</span>
							</td>
						</tr>
					<!-- 	<tr>
							<td class = "d-inline-flex border w-100">
								<i class="fa fa-arrow-down text-white border fa-5x bg-danger" aria-hidden="true"></i>
								<span class = "consolidado">
									<h6 class = "pt-2">Consultas à Pagar</h6>
									<p class = "text-center text-danger">R$00,00</p>
								</span>
							</td>
						</tr> -->
					<?php }?>
				  </tbody>
				</table>
			</div>




			<div class = "col-lg-3 mt-5 overflow-auto" style = "max-height: 280px">
				<table class="table table-hover border">
					<thead>
						<tr class = "bg-light">
							<th class = "text-center" colspan = "3"> <i class="fa fa-check-square-o mr-2" aria-hidden="true"></i>Procedimentos Realizados</th>
						</tr>
					</thead>
					<thead >
						<tr>
							<th scope="col">Paciente</th>
							<th class = "text-center" scope="col">Procedimento</th>
							<th class = "text-center" scope="col">Dentista</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include_once 'conexao.php';
                            $sql = "SELECT DISTINCT 
		                            pr.id AS procedimento_id, 
		                            p.nome AS paciente_nome, 
		                            a.data AS atendimento_data, 
		                            prt.nome As procedimento_tipo_nome,
		                            d.nome as dentista_nome
		                            FROM atendimento a,
		                            paciente p, dentista d, procedimento pr, 
		                            procedimento_tipo prt 
		                            WHERE 
		                            p.id = a.paciente_id 
		                            AND 
		                            prt.id = pr.procedimento_tipo_id
		                            AND 
		                            a.id = pr.atendimento_id 
		                            AND 
		                            d.id = a.dentista_id 
		                            AND 
		                            a.data = left(now(),10) ORDER BY paciente_nome asc";

                                $busca = mysqli_query($con, $sql);
                                while($array = mysqli_fetch_array($busca)){
                                    $paciente_nome = $array['paciente_nome'];
                                    $procedimento_tipo_nome = $array['procedimento_tipo_nome'];
                                    $dentista_nome = $array['dentista_nome']
                            ?>
                            <tr>
                                <td><?php echo $paciente_nome?></td>                                  
                                <td class = "text-center"><?php echo $procedimento_tipo_nome?></td>
                                <td class = "text-center"><?php echo $dentista_nome?></td>
                            </tr>
                        <?php };?>
					</tbody>
				</table>
			</div>
			<div class = "col"></div>
		<!-- Visualização dos procedimentos realizados -->
		</div>			
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>