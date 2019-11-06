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
                font-size:25px;
                transition: box-shadow 1s, font-size 2s;
            }


        </style>
    </head>
    <body>
        
        <?php include 'header.php'?>

        <h1 class = "text-center mb-4">Agenda de Pacientes</h1>
        
     <div class = "container">
            <div class = "row justify-content-center">
                <button id = "buttonEdicao" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal1">Editar Dados do Produto</button>
            </div>
            <div class = "text-center">
                <a href="agenda.php" style = "font-size:20px;">Voltar</a>
            </div>
        </div>

    <div class = "pl-5 pr-5">
    <span class = "d-flex d-inline-flex mb-2">                

            
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
                                        <label for="nome">Paciente</label>
                                        <select type="text" class="form-control" id="nome" placeholder="" name = "nome" value = "<?php echo $nome?>">
                                         

                                        <?php
                                            include_once 'conexao.php';

                                            $sql = "SELECT * FROM pessoa";

                                            $busca = mysqli_query($con, $sql);

                                            while($array = mysqli_fetch_array($busca)){

                                                $nome = $array['nome'];

                                                ?>

                                              <option><?php echo $nome ?></option>
                               
                                        <?php } ?>
                                        </select>
                                    </div> 

                                 <!-- AQUI É A LISTA DE SELEÇÃO DA consultas-->
                                    <div class="form-group">
                                    <label>Tipo da Consulta</label>
                                    <select class="form-control" name="nomeconsulta" id="nomeconsulta" placeholder="" name="nomeconsulta" value = "<?php echo $nomeconsulta?>" >
                   
                                    <?php
                                       include_once 'conexao.php';

                                        $sql = "SELECT * FROM tipoconsulta";

                                        $busca = mysqli_query($con, $sql);

                                        while($array = mysqli_fetch_array($busca)){
                                    
                                        $nomeconsulta = $array['nomeconsulta'];
                               
                                    ?>

                                    <option><?php echo $nomeconsulta ?></option>
                               
                                        <?php } ?>                          
                                    </select>
                                    </div>

                                   <div class="form-group">
                                        <label for="data">Data</label>
                                        <input type="date" class="form-control" id="data" placeholder="" name = "dia" value = "<?php echo $dia?>" >
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="hora">Hora</label>
                                        <input type="time" class="form-control" id="hora" placeholder="" name = "hora" value = "<?php echo $hora?>" >
                                    </div>                                  
                                    <div class="form-group">
                                        <label for="descricao">Descrição</label>
                                        <input type="text" class="form-control" id="descricao" placeholder="" name = "descricao" value = "<?php echo $descricao?>" >
                                    </div>
                                    <!-- AQUI É A LISTA DE SELEÇÃO DE DENTISTA-->
                                    <div class="form-group">
                                    <label>Nome Dentista</label>
                                    <select class="form-control" name="nomedentista" id="nomedentista" placeholder="" name="nomedentista" value = "<?php echo $nomedentista?>" >
                   
                                    <?php
                                       include_once 'conexao.php';

                                        $sql = "SELECT * FROM dentista";

                                        $busca = mysqli_query($con, $sql);

                                        while($array = mysqli_fetch_array($busca)){
                                    
                                        $nomedentista = $array['nomedentista'];
                               
                                    ?>

                                       <option><?php echo $nomedentista ?></option>
                               
                                        <?php } ?>                          
                                    </select>
                                    </div>

                                        <div class="form-check form-check-inline">  
                                          <input class="form-check-input" type="radio" name="gender" value="agendar" checked> Agendar<br>
                                        </div>

                                        <div class="form-check form-check-inline">  
                                          <input class="form-check-input" type="radio" name="gender" value="confirmar"> Confirmar<br>
                                        </div>

                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="gender" value="cancelar"> Cancelar<br>
                                        </div>

                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="gender" value="realizadas"> Realizadas
                                        </div>

                                    <input type="submit" class="btn btn-primary float-right" value = "Cadastrar">
                                </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>

    </span>                
                
                        </thead>
                        <tbody>
                            <?php

                                include_once 'conexao.php';

                                $sql = "SELECT * FROM atend";

                                $busca = mysqli_query($con, $sql);

                                while($array = mysqli_fetch_array($busca)){

                                    $id_atend = $array['id_atend']
                                    $nome = $array['nome'];
                                    $nomeconsulta = $array['nomeconsulta'];
                                    $dia = $array['dia'];
                                    $hora = $array['hora'];
                                    $descricao = $array['descricao']; 
                                    $nomedentista = $array['nomedentista'];   
                                                             
                               
                                    //Ajuste da formatação da data DD/MM/AAAA
                                    $dtConsu = explode('-', $dia);
                                    $diaConsu = $dtConsu[2] . "-" . $dtConsu[1]. "-" . $dtConsu[0];
                            ?>
                                
                            
                            <?php } ?>

                            <!--Modal Fim Formulário de Agendamento -->


                            <!--Moda2 Formulário de Procedimentos -->                       

                           
                            <!--Moda2 Fim Formulário de Procedimentos -->


                        </tbody>
                    </table>
                </div>
            </div>     
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
