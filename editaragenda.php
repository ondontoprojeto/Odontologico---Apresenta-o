<?php
    include 'conexao.php';
    
    $id = $_GET["id"];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Odonto - Inicio</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="styleHeader.css">

    <style type="text/css">
        #buttonEdicao:hover{
            box-shadow: 2px 2px 2px black;
            font-size:20px;
            transition: box-shadow 1s, font-size 2s;
        }
    </style>
</head>
<body>
    <?php include 'header.php'?>
    <div class = "container">
        <div class = "row justify-content-center">
            <button id = "buttonEdicao" type="button" class="btn btn-primary btn-md ml-2" data-toggle="modal" data-target="#modalCadastro">Editar Atendimento</button>
        </div>
        <div class = "text-center">
            <a href="agenda.php" style = "font-size:20px;">Voltar</a>
        </div>
    </div>
   <!-- <div class = "pl-5 pr-5">
    <span class = "d-flex d-inline-flex mb-2">   -->             
            <!--Modal Formulário de Agendamento -->
    <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-primary" id="modalTitle">Cadastro de Consultas</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="front-left">Dados da Consulta</h5>
                    <form class = "form-group mt-2" action="atualizaAgendaConsu.php" method="post"> 


                        <?php
                            $sql = "SELECT * FROM atendimento WHERE id = '$id'";
                            $buscar = mysqli_query($con, $sql);
                            while ($array = mysqli_fetch_array($buscar)){
                            $id = $array['id'];
                            $paciente_id = $array['paciente_id'];
                            $dentista_id = $array['dentista_id'];
                            $data = $array['data'];
                            $descricao = $array['descricao'];
                            $hora = $array['hora'];
                        ?>
                        <div class="form-group">
                            <label for="nome">Paciente:</label>
                            <?php
                                include_once 'conexao.php';

                                $sql = "SELECT p.nome, a.paciente_id FROM paciente p, atendimento a WHERE p.id = a.paciente_id AND a.id = $id";
                                $executar = mysqli_query($con, $sql);
                                while($rows = mysqli_fetch_array($executar)){
                                    $nome = $rows['nome'];

                            ?>
                            <input type="text" class="form-control" name="paciente" disabled id = "nome" value = "<?php echo $nome?>">
                            <?php
                                }
                            ?>
                        </div> 
                       <div class="form-group">
                            <input type="text" class="form-control" id="id" placeholder="" name = "id" value = "<?php echo $id?>" style = "display: none;">
                        </div>
                        <div class = "form-row">
                            <div class="form-group col-md-6">
                                <label for="data">Data</label>
                                <input type="date" class="form-control" id="data" placeholder="" name = "dia" value = "<?php echo $data?>" >
                            </div>   

                            <div class="form-group col-md-6">
                                <label for="hora">Hora</label>
                                <input type="time" class="form-control" id="hora" placeholder="" name = "hora" value = "<?php echo $hora?>" >
                            </div>   
                        </div>
                         <div class="form-group">
                            <label>Nome Dentista</label>
                            <select class="form-control" name="nomedentista" id="nomedentista" placeholder="" name="nomedentista">
                            <?php
                               include_once 'conexao.php';

                                $sql = "SELECT * FROM dentista";
                                $busca = mysqli_query($con, $sql);
                                while($row1 = mysqli_fetch_array($busca)){
                                $dentista_id = $row1['id'];
                                $nomedentista = $row1['nome'];
                            ?>
                               <option value = "<?php echo $dentista_id?>"><?php echo $nomedentista ?></option>
                                <?php }; ?>                          
                            </select>
                        </div>                              
                        <div class="form-group">
                            <label for="obs">Descrição:</label>
                            <input id = "obs" type="text" class="form-control" id="descricao" placeholder="" name = "descricao" value = "<?php echo $descricao?>">
                        </div>  
                        <!-- AQUI É A LISTA DE SELEÇÃO DE DENTISTA-->
                        <div class = "d-flex justify-content-around">
                            <div class="form-check form-check-inline">  
                              <input class="form-check-input" type="radio" name="gender" value="Agendado" checked> Agendar<br>
                            </div>

                            <div class="form-check form-check-inline">  
                              <input class="form-check-input" type="radio" name="gender" value="Confirmado"> Confirmar<br>
                            </div>

                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" value="Cancelado"> Cancelar<br>
                            </div>
                        </div>
                        <div  class = "mt-3" style="text-align: right">    
                            <button style = "font-size :17px" type="submit" id="botao" class="btn btn-sm bg-primary text-white">Atualizar</button>
                        </div>
                    <?php }?>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>                 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>