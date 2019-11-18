<!DOCTYPE html>
<html>
	<head>
		<title>Odonto - Procedimentos</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="styleHeader.css">
        <script>
            function excluirProdedimento(id){
                if(confirm('Deseja realmente excluir este Procedimento?')){
                    location.href = 'deletarProcedimento.php?id=' + id;   
                }
            }
        </script>
	</head>
	<body>
		<?php include 'header.php'?>
    <?php
        include_once 'conexao.php';    
        $atendimento_id = $_GET['atendimento_id'];

                        $sql = "SELECT DISTINCT
                                    a.id,
                                    a.data,
                                    a.descricao,
                                    p.nome AS paciente_nome,
                                    d.nome AS dentista_nome,
                                    prt.nome as procedimento_nome
                                    FROM
                                    atendimento a,
                                    paciente p,
                                    dentista d,
                                    procedimento pr,
                                    procedimento_tipo prt
                                    WHERE 
                                    a.paciente_id = p.id
                                    AND 
                                    a.dentista_id = d.id
                                    AND
                                    prt.id = pr.procedimento_tipo_id
                                    AND
                                    a.id = '$atendimento_id'";
                        $busca = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($busca);
                        $data = $row['data'];
                        $row['data'] = explode('-', $row['data']);
                        $newdata = $row['data'][2] . "-" . $row['data'][1]. "-" . $row['data'][0];
                        ?>  
        <h1 class = "text-center mb-4">Procedimentos Realizados</h1>
<div class = "pl-5 pr-5">

    <div class="form-row">
        <button type="button" class="btn btn-primary btn-md ml-2" data-toggle="modal" data-target="#modal1">Cadastrar Procedimentos</button>
        <input type="button" class ="btn btn-dark ml-5" onclick="window.print();" value="Imprimir">
        <a class="btn btn-success ml-5"  style="color:#fff" href="agenda.php" role="button">Voltar</a>
    </div>

    <div class="form-row mt-3">
        <div class="form-group col-md-3 ml-1">
            <label For="paciente_nome">Paciente:</label>
            <input type="text" class="form-control" id="paciente_nome" placeholder="" name = "paciente_nome" value = "<?php echo $row['paciente_nome']?>" disabled >
        </div>
        <div class="form-group col-md-2">
            <label for="dentista_nome">Dentista:</label>
            <input type="text" class="form-control" id="dentista_nome" placeholder="" name = "dentista_nome" value = "<?php echo $row['dentista_nome'];?>" disabled>
        </div> 
        <div class="form-group col-md-2">
            <label for="data">Data:</label>
            <input type="text" class="form-control" id="cep" placeholder="" name = "data" value = "<?php echo $newdata;?>" disabled>
        </div>
    </div>
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-primary" id="modalTitle">Cadastro de Procedimentos</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="front-left">Descrição do Procedimento</h5>
                    <form class = "form-group mt-2" action="procedimentoadd.php" method="post">
                        
                        <input type="hidden" name="atendimento_id" value="<?php echo $atendimento_id ?>">
                        
                        <div class="form-group">
                                <label>Tipo do Procedimento:</label>
                                <select class="form-control" name="procedimento_tipo_id" id="procedimento_tipo_id" placeholder="" name="nomedentista">
                                    <?php
                                       include_once 'conexao.php';
                                        $sql = "SELECT * FROM procedimento_tipo ORDER BY nome ASC";
                                        $busca = mysqli_query($con, $sql);

                                        while($array = mysqli_fetch_array($busca)){
                                            $id     = $array['id'];
                                            $nome   = $array['nome'];
                                    ?>
                                        <option value="<?php echo $id ?>"><?php echo $nome ?></option> 
                                    <?php } ?>                          
                                </select>
                            </div>
                        <div class="form-group">
                            <label for="valor">Valor:</label>
                            <input type="text" class="form-control" id="valor" placeholder="" name = "valor">
                        </div>
                    <div class="form-group">
                            <label for="obs">Observação:</label>
                        <textarea type="text" class="form-control" id="obs" placeholder="" name = "obs"></textarea>
                        </div>
                        
                        <input type="submit" class="btn btn-primary float-right" value = "Cadastrar">
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <div class = "overflow-auto ml-1 mr-1" style = "max-height: 550px">
        <table class="table w-100 mt-4 table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Procedimento </th>
                    <th scope="col">valor</th>
                    <th scope="col">OBS</th>                               
                    <th scope = "col"></th>
                </tr>
            </thead>
            <tbody>
                <?php

                include_once 'conexao.php';
                
                $atendimento_id = $_GET['atendimento_id'];
                
                $sql = "SELECT 
                        pr.id,
                        pr.valor,
                        pr.obs,
                        prt.nome AS procedimento_nome
                        FROM procedimento pr, procedimento_tipo prt
                        WHERE
                        prt.id = pr.procedimento_tipo_id
                        AND
                        pr.atendimento_id = $atendimento_id";
                //echo($sql);
                
                    $busca = mysqli_query($con, $sql);

                    while($array = mysqli_fetch_array($busca)){
                        $id     = $array['procedimento_nome'];
                        $valor  = $array['valor'];
                        $obs    = $array['obs'];
                ?>
                    <tr>                                    
                        <td><?php echo $id ?></td>                                   
                        <td><?php echo $valor ?></td>
                        <td><?php echo $obs ?></td>
                        <td class = "d-flex justify-content-around">
                            <a class="btn btn-danger btn-sm"  style="color:#fff" onclick="excluirProdedimento(<?php echo $array['id']?>)" role="button">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                Excluir
                            </a>
                        </td>
                    </tr>
                <?php
            };?>                    
            </tbody>
        </table>
    </div>
</div>     
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>