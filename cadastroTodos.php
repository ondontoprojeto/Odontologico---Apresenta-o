<!DOCTYPE html>
<html>
	<head>
		<title>Odonto - Cadastro</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="styleHeader.css">
        <script>
            function excluir(id){
                if(confirm('Deseja realmente excluir este Paciente?')){
                    location.href = 'deletarCadastro.php?id=' + id;   
                }
            }
        </script>
	</head>
	<body>
		<?php include 'header.php'?>

		<h1 class = "text-center mb-4">Relatório de Cadastramento</h1>
			
        <div class = "pl-5 pr-5">
            <span class = "d-flex d-inline-flex mb-2">
                <input type="button" class ="btn btn-dark" onclick="window.print();" value="Imprimir">

                <a class = "ml-4" href="cadastro.php"><button class = "btn btn-primary">voltar</button></a>
            </span>
                <!--Modal  Tela de Cadastro-->
            <div class = "overflow-auto mr-1 mt-3" style = "max-height: 550px">
                <table class="table table-hover">
                    <thead id = "theadCadastro" class = "thead-dark">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">Celular</th>
                            <th scope ="col">Telefone</th>
                            <th scope="col">E-mail</th>
                            
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody id = "tbodyCadastro">
                        <?php
                        include_once 'conexao.php';
                        $sql = "SELECT * FROM paciente";
                        $buscar = mysqli_query($con, $sql); 
                        while($array = mysqli_fetch_array($buscar)){
                            $id = $array['id'];
                            $data = $array['nascimento'];

                            $data = explode('-', $data);
                            $newdata = $data[2] . "-" . $data[1]. "-" . $data[0];
                        ?>
                            <tr><td><?php echo $array['nome']?></td>
                                <td><?php echo $newdata?></td>
                                <td><?php echo $array['celular']?></td> 
                                <td><?php echo $array['telefone']?></td>                               
                                <td><?php echo $array['email']?></td>
                                <td class = "d-flex justify-content-around">

                                    <a style = "font-size:15px" class="btn btn-primary btn-sm"  style="color:#fff" href="ficha.php?id=<?php echo $id?>" role="button">
                                        <i class="fa fa-address-book-o mr-2" aria-hidden="true"></i>
                                        Visualizar Ficha
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                       </tbody>
                    </table>
                </div>
            </div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>