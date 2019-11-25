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
		<h1 class = "text-center">Consolidado Financeiro (Totalizado)</h1>
		<!-- Visualização de consolidado Financeiro -->
		<div class = "row">
			<div class = "col"></div>
			<div class="col-md-3 mt-5">
		    	<table class=" table border w-100">
		    		<thead>
					  	<tr class = "bg-light">
					  		<th class = "text-center"><i class="fa fa-money mr-2" aria-hidden="true" colspan = "1"></i>Consolidado Financeiro</th>
					  	</tr>
				  	</thead>
				  	<tbody>
				  		<?php
								include_once 'conexao.php';
	                            $sql = "SELECT SUM(p.valor) As soma, a.data AS data FROM procedimento p , atendimento a WHERE a.id = p.atendimento_id";
                                $busca = mysqli_query($con, $sql);
                                while($array = mysqli_fetch_array($busca)){
                                	$soma = $array['soma'];
                            ?>
						<tr>
							<td class = "d-inline-flex border w-100">
								<i class="fa fa-arrow-up text-white border fa-5x bg-success" aria-hidden="true"></i>
								<span class = "consolidado">
									<h6 class = "pt-2">Consultas Recebidas</h6>
									<p class = "text-center text-success">R$ <?php echo $soma?>,00</p>
								</span>
							</td>
						</tr>
						<!-- <tr>
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
		
			<div class="col-lg-7 mt-5 overflow-auto" style = "max-height: 500px">
		    	<table class="table w-100 table-hover border">
		            <thead class="thead-dark">
		                <tr>
		                    <th scope="col">Procedimento </th>
		                    <th scope = "col">Data</th>
		                    <th scope="col">valor</th>
		                    <th scope="col">Observação</th>                               
		                </tr>
		            </thead>
		            <tbody>
		                <?php

		                include_once 'conexao.php';
		                	$sql = "SELECT 
			                        pr.id,
			                        pr.valor,
			                        pr.obs,
			                        prt.nome AS procedimento_nome,
			                        a.data As atendimento_data
			                        FROM procedimento pr, procedimento_tipo prt, atendimento a
			                        WHERE
			                        prt.id = pr.procedimento_tipo_id
			                        AND
			                        a.id = pr.atendimento_id ORDER BY atendimento_data";
		                
		                    $busca = mysqli_query($con, $sql);

		                    while($array = mysqli_fetch_array($busca)){
		                        $id     = $array['procedimento_nome'];
		                        $valor  = $array['valor'];
		                        $data1 = $array['atendimento_data'];
		                        $obs    = $array['obs'];

		                        $data = explode('-', $data1);
								$newData = $data[2] . "-" . $data[1]. "-" . $data[0];
		                ?>
		                    <tr>                                    
		                        <td><?php echo $id ?></td>
		                        <td><?php echo $newData?></td>                                   
		                        <td> R$ <?php echo $valor ?></td>
		                        <td><?php echo $obs ?></td>
		                    </tr>
		                <?php
		            };?>                    
		            </tbody>
		        </table>
			</div>
			<div class = "col"></div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>