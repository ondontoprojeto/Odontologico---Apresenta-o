<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="styleHome.css">
        <link rel="stylesheet" type="text/css" href="styleHeader.css">
    <title>Odontológico</title>
</head>
<body>
    <?php include 'header.php';?>
    <div class="container">
        <?php $msg = $_GET["erro"];?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $msg;?>
                </div>
        <a href="login.php">Voltar</a>
    </div>
</body>
</html>

<!-- <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true"> 
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title text-primary ml-5" id="modalTitle">Cadastro de Procedimentos</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body2">
                <h5 class = "ml-4">Tipo de Procedimentos:</h5>
              <form class = "form-group mt-2 ml-4 mr-4" action="AgendaconsuProced.php" method="post">
                <div class="form-group">

                                        <label for="id_atendimento">ID Atendimento</label>
                                        <input type="number" class="form-control" id="id_atend" placeholder="" name = "id_atend">
                                    </div>                    

                                   
                                    <div class="form-group">
                                        <label for="id_paciente">ID Paciente</label>
                                        <input type="text" class="form-control" id="id_paciente" placeholder="" name = "id_paciente">
                                    </div>

                                    <div class="form-group">
                                    <label>Nome do Procedimento</label>
                                    <select class="form-control" name="tipoproce" id="tipoproce" placeholder="" name="tipoproce">
                   
                                    <?php
                                       include_once 'conexao.php';

                                        $sql = "SELECT * FROM procedimento";

                                        $busca = mysqli_query($con, $sql);

                                        while($array = mysqli_fetch_array($busca)){
                                    
                                        $tipoproce = $array['tipoproce'];
                               
                                    ?>

                                        <option><?php echo $tipoproce ?></option> 
                               
                                        <?php } ?>                          
                                    </select>
                                    </div>

                                    <div class="form-group">
                                    <label>Nome Dentista</label>
                                    <select class="form-control" name="nomedentista" id="nomedentista" placeholder="" name="nomedentista">
                   
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

                                    <div class="form-group">
                                        <label for="valor">Valor</label>
                                        <input type="text" class="form-control" id="valor" placeholder="" name = "valor">
                                    </div>

                                    <div class="form-group">
                                            <label for="Evolução">Evolução</label>
                                            <input type="text" class="form-control" id="evolucao" id="evolucao" placeholder="" name = "evolucao">
                                    </div>
                                    <?php
                                    include_once 'conexao.php';

                                $sql = "SELECT * FROM consuproced";

                                $busca = mysqli_query($con, $sql);

                                while($array = mysqli_fetch_array($busca)){


                                    $id_consuproced = $array['id_consuproced'];
                                    $nomeproced = $array['nomeproced'];
                                    $nomedentista = $array['nomedentista'];
                                    $evolucao = $array['evolucao'];
                                    $valor = $array['valor'];
                                 ?> 

                                 <tr>
                                    
                                    <td><?php echo $id_consuproced?></td>
                                    <td><?php echo $nomeproced?></td>
                                    <td><?php echo $nomedentista?></td>
                                    <td><?php echo $evolucao?></td>
                                    <td><?php echo $valor?></td>
                                    <td>

                                        
                                    </td>
                                </tr>
                            <?php } ?>  
                                    <input type="submit" class="btn btn-primary float-right" value = "Cadastrar">
                                </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div> -->