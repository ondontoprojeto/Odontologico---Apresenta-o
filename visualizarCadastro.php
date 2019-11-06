<?php
    include 'conexao.php';
    
    $id = $_GET["idPessoa"];

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Odonto - Inicio</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="styleHome.css">
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

        <div class = "container">

            <div class = "row justify-content-center">
            Editar Dados do Paciente<!-- <button id = "buttonEdicao" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal1">Editar Dados do Paciente</button> -->
            </div>
            <div class = "text-center">
                <a href="cadastro.php" style = "font-size:20px;">Voltar</a>
            </div>
           
        </div>

        <!--Modal  Tela de Cadastro-->
        <!--
        <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-primary text-center" id="modalTitle">Edição de Cadastro</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>-->

                    <div class="modal-body">
                        <h5>Dados do Paciente:</h5>
                            <?php
                                $sql = "SELECT * FROM pessoa WHERE id_pessoa = '$id'";
                                $buscar = mysqli_query($con, $sql);


                                while ($array = mysqli_fetch_array($buscar)){


                                $idPessoa = $array['id_pessoa'];
                                $cpf = $array['cpf'];
                                $rg = $array['rg'];
                                $nome = $array['nome'];
                                $orcamento = $array['orcamento'];
                                $telefone = $array['telefone'];
                                $celular = $array['celular'];
                                $email = $array['email'];
                                $cep = $array['cep'];
                                $endereco = $array['endereco'];
                                $complemento = $array['complemento'];
                                $bairro = $array['bairro'];
                                $nascimento = $array['nascimento'];
                                $cidade = $array['cidade'];
                                $uf= $array['uf'];
                                $situacaoficha = $array['situacaoficha'];
                                $doencabase = $array['doencabase'];
                                $alergia = $array['alergia'];
                                $medicamentos = $array['medicamentos'];
                                $cirurgia = $array['cirurgia'];
                                $internacoes = $array['internacoes'];
                                $pa = $array['pa'];
                                $queixaprinc = $array['queixaprinc'];    
                            ?>


                            <div class="form-group">
                                <label for="cpf">CPF:</label> <?php echo $cpf?>
                            </div>

                            <div class="form-group">
                                <label for="rg">RG:</label> <?php echo $rg?>
                            </div>

                            <div class="form-group">
                                <label for="nome">Nome:</label> <?php echo $nome?>
                            </div>

                            <div class="form-group">
                                <label for="orcamento">Orçamento:</label> <?php echo $orcamento?>
                            </div>

                            <div class="form-group">
                                <label for="telefone">Telefone:</label> <?php echo $telefone?>
                            </div>

                            <div class="form-group">
                                <label for="celular">Celular:</label> <?php echo $celular?>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label> <?php echo $email?>
                            </div>                              
                                                        

                            <div class="form-group">
                                <label for="cep">CEP:</label> <?php echo $cep?>
                            </div>

                            <div class="form-group">
                                <label for="endereco">Endereço:</label> <?php echo $endereco?>
                            </div>  

                            <div class="form-group">
                                <label for="complemento">Complemento:</label> <?php echo $complemento?>
                            </div>
                            
                            <div class="form-group">
                                <label for="bairro">Bairro:</label> <?php echo $bairro?>
                            </div>

                            <div class="form-group">
                                <label for="nascimento">Data de Nascimento:</label> <?php echo $nascimento?>
                            </div>  

                            <div class="form-group">
                                <label for="inicio_tratamento">Inicio do Tratamento:</label> <?php echo $inicio_tratamento?> <!-- andreneves nao encontrei este campo... esta dando erro -->
                            </div>  

                            <div class="form-group">
                                <label for="cidade">Cidade:</label> <?php echo $cidade?>
                            </div>

                            <div class="form-group">
                                <label for="uf">UF:</label> <?php echo $uf?>
                            </div>

                            <div class="form-group">
                                <label for="situacaoficha">Situação da Ficha:</label> <?php echo $situacaoficha?>
                            </div>

                            <div class = "mb-2">
                                <h5>-----------------------Anamnese---------------------</h5>
                            </div>  

                            <div class="form-group">
                                <label for="data">Doenças de Base:</label> <?php echo $doencabase ?>
                            </div>

                            <div class="form-group">
                                <label for="alergia">Alergias:</label> <?php echo $alergia?>
                            </div>  

                            <div class="form-group">
                                <label for="medicamentos">Medicamentos:</label> <?php echo $medicamentos?>
                            </div>

                            <div class="form-group">
                                <label for="cirurgia">Cirurgias:</label> <?php echo $cirurgia?>
                            </div>

                            <div class="form-group">
                                <label for="internacoes">Internacões:</label> <?php echo $internacoes?>
                            </div>

                            <div class="form-group">
                                <label for="pa">P.A:</label> <?php echo $pa?>
                            </div>

                            <div class="form-group">
                                <label for="queixaprinc">Queixas Principais:</label> <?php echo $queixaprinc?>
                            </div>                      

                        <?php };?>
                        </form>
                        <!--
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>-->
          
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
