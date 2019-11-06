<!DOCTYPE html>
<html>
  <head>
    <title>Odonto - Administração</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="styleHeader.css">
    <script>
      function excluirLogin(id){
        if(confirm('Deseja realmente excluir este Login?')){
            location.href = 'deletarLogin.php?id=' + id;   
        }
      }
    </script>
    <script>
      function excluirAtendimento(id){
        if(confirm('Deseja realmente excluir este Atendimento?')){
          location.href = 'deletarAtendimento.php?id=' + id;   
      }
    }
    </script>
    <script>
      function excluirProcedimento(id){
          if(confirm('Deseja realmente excluir este Procedimento?')){
              location.href = 'deletarProcedimento.php?id=' + id;   
          }
        }
    </script>
     <script>
      function excluirDentista(id){
          if(confirm('Deseja realmente excluir este Dentista?')){
              location.href = 'deletarDentista.php?id=' + id;   
          }
        }
    </script>
  </head>
  <body>

  <?php include 'header.php'?>  

    <h1 class = "text-center mb-4">Painel Administrativo</h1>
      <div class = "row">
        <div class = "d-flex justify-content-center col-md-6">
          <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal1">Cadastro de Usuário</button>
        </div>
        <div class = "d-flex justify-content-center col-md-6">
          <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal2">Cadastro de Atendimento</button>
        </div>      
      </div>
    <span class = "d-flex d-inline-flex mb-2">
           <?php
          
              if(isset($_GET["nome"])){
                  $nome = $_GET["nome"];

                  include_once 'conexao.php';
                  
                  $sql = "SELECT * FROM login WHERE login
                  LIKE '{$login}%'";
                  
                  $result = mysqli_query($con, $sql); 
              }           
            ?> 

            <?php
          
              if(isset($_GET["nome"])){
                  $nome = $_GET["nome"];

                  include_once 'conexao.php';
                  
                  $sql = "SELECT * FROM atendimento WHERE nome
                  LIKE '{$nome}%'";
                  
                  $result = mysqli_query($con, $sql); 
              }           
            ?> 
    <!--Modal  Tela de Cadastro--USUÁRIO-->
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title text-primary ml-5" id="modalTitle">Cadastro de Usuário</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5>Dados Pessoais:</h5>
            <form class = "form-group mt-2" action="admCadastrol.php" method="post">
              <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="" name = "nome">
              </div>              
              <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" class="form-control" id="login" placeholder="" name = "login">
              </div> 

              <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" id="senha" placeholder="" name = "senha">
              </div> 
              <!-- Alterar -->
              <div class="form-group">
                <label>Perfil:</label>
                <select name="perfil" class="form-control">
                    <option value="" disabled selected>- Escolha -</option>
                    <option value="Administrativo">Administrativo</option>
                    <option value="Funcionário">Funcionário</option>
                    <option value="Visitante">Visitante</option>
                </select>
              </div>
              <input type="submit" class="btn btn-primary float-right mt-2" value = "Cadastrar">
            </form>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
  </span>
    <div class = "row d-flex justify-content-center">
      <div class = "col-md-6 overflow-auto mr-1" style = "height: 300px">
        <table class="table border table-striped">
          <thead id = "theadCadastro" class = "bg-light">
            <tr>
              <th scope="col">Nome</th>                    
              <th scope="col">Login</th>
              <th scope="col">Perfil</th> 
              <th></th>      
              
            </tr>
          </thead>
          <tbody id = "tbodyCadastro">
            <?php
              include_once 'conexao.php';

              $sql = "SELECT * FROM login";

              $busca = mysqli_query($con, $sql);

              while($array = mysqli_fetch_array($busca)){             
                          
              $nome = $array['nome']; 
              $login = $array['login'];
              $perfil = $array['perfil'];                      

            ?>
              <tr>
                <td><?php echo $nome?></td>                
                <td><?php echo $login?></td>              
                <td><?php echo $perfil?></td>             
                <td class = "d-flex justify-content-end">
                  <a class="btn btn-warning btn-sm mr-3"  style="color:#fff" href="editarLogin.php?id=<?php echo $array['id_user'] ?>" role="button"><i class="fa fa-pencil-square-o"></i> Editar</a> 
                  <a class="btn btn-danger btn-sm"  style="color:#fff" onclick = "excluirLogin(<?php echo $array['id_user']?>)" role="button"><i class="fa fa-trash-o"></i> Excluir</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!--Modal  Tela de Cadastro Tipo da Consulta-->  
      <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true"> 
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h3 class="modal-title text-primary ml-5" id="modalTitle">Tipo do Atendimento</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body2">
                    <h5 class = "ml-4">Nome do Atendimento</h5>
                      <form class = "form-group mt-2 ml-4 mr-4" action="admcadatendimento.php?>" method="post">
                          <div class="form-group">
                            <label for="atendimentonome">Nome:</label>
                            <input type="text" class="form-control" id="atendimentonome" placeholder="" name = "atendimentonome">
                          </div>
                          
                          <input type="submit" class="btn btn-primary float-right" value = "Cadastrar">
                      </form>
                  </div>
                  <div class="modal-footer">
                  </div>
              </div>
          </div>
      </div>

      <!-- Tabela de cadastro Tipo da Consulta -->
      <div class = "col-md-5 overflow-auto ml-1 mr-1" style = "max-height: 350px">
        <table class="table border table-striped">
          <thead id = "theadCadastro" class = "bg-light">
            <tr>
              <th scope="col">Nome do Atendimento</th>                    
              <th></th>  
            </tr>
          </thead>
          <tbody id = "tbodyCadastro">
            <?php
              include_once 'conexao.php';
              $sql = "SELECT * FROM atendimento_tipo";
              $busca = mysqli_query($con, $sql);
              while($array = mysqli_fetch_array($busca)){             
                $atendimentonome = $array['atendimentonome']; 
            ?>
              <tr>
                <td><?php echo $atendimentonome?></td>                                   
                 <td class = "d-flex justify-content-end">
                  <a class="btn btn-warning btn-sm mr-3"  style="color:#fff" href="editarAtendimento.php?id=<?php echo $array['atendimentotipo_id'] ?>" role="button"><i class="fa fa-pencil-square-o"></i> Editar</a> 
                  <a class="btn btn-danger btn-sm"  style="color:#fff" onclick = "excluirAtendimento(<?php echo $array['atendimentotipo_id']?>)" role="button"><i class="fa fa-trash-o"></i> Excluir</a>
                </td>
              </tr>  
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

  <!-- INICIO Modal Cadastro Dentista-->
  <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true"> 
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-primary ml-5" id="modalTitle">Cadastro de Dentistas</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body2">
            <h5 class = "ml-4">Nome do Dentista</h5>
          <form class = "form-group mt-2 ml-4 mr-4" action="admCadDentista.php" method="post">
            <div class="form-group">
              <label for="nomedentista">Nome:</label>
              <input type="text" class="form-control" id="nomedentista" placeholder="" name = "nomedentista">
            </div>
            <div class="form-group">
              <label for="crodentista">CRO:</label>
              <input type="text" class="form-control" id="cro" placeholder="" name = "cro">
            </div>                           
            <input type="submit" class="btn btn-primary float-right" value = "Cadastrar">
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

    <div class = "row mt-5">
      <div class = "d-flex justify-content-center col-md-6">
        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal4">Cadastro de Dentista</button>
      </div>
      <div class = "d-flex justify-content-center col-md-6">
        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal3">Cadastro de Procedimentos</button>
      </div>      
    </div>


  <!-- Tabela de cad Dentista -->
    <div class = "row d-flex justify-content-center">
      <div class = "col-md-6 overflow-auto ml-1 mr-1 mt-4" style = "max-height:350px">
        <table class="table border table-striped">
          <thead id = "theadCadastro" class = "bg-light">
            <tr>
              <th scope="col">Nome Dentista</th>
              <th scope="col">CRO</th>
              <th></th>                   
            </tr>
          </thead>
          <tbody id = "tbodyCadastro">
            <?php
              include_once 'conexao.php';
              $sql = "SELECT * FROM dentista";
              $busca = mysqli_query($con, $sql);
              while($array = mysqli_fetch_array($busca)){                       
              $nomedentista = $array['nome'];
              $cro = $array['cro'];  
            ?>
            <tr>
              <td><?php echo $nomedentista?></td>
              <td><?php echo $cro?></td>                
               <td class = "d-flex justify-content-end">
                  <a class="btn btn-warning btn-sm mr-3"  style="color:#fff" href="editarDentista.php?id=<?php echo $array['id'] ?>" role="button"><i class="fa fa-pencil-square-o"></i> Editar</a> 
                  <a class="btn btn-danger btn-sm"  style="color:#fff" onclick = "excluirDentista(<?php echo $array['id']?>)" role="button"><i class="fa fa-trash-o"></i> Excluir</a>
                </td>
            </tr>   
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- FIM Modal Cadastro Dentista-->

      <!--Modal Procedimentos--> 
      <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true"> 
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
              <form class = "form-group mt-2 ml-4 mr-4" action="admCadProcedimento.php" method="post">
                <div class="form-group">
                  <label for="nome">Nome:</label>
                  <input type="text" class="form-control" id="nome" placeholder="" name = "nome">
                </div>                            
                <input type="submit" class="btn btn-primary float-right" value = "Cadastrar">
              </form>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>

      <!-- Tabela de Procedimentos -->
      <div class = "col-md-5 overflow-auto ml-1 mr-1 mt-4" style = "max-height:350px">
        <table class="table border table-striped">
          <thead id = "theadCadastro" class = "bg-light">
            <tr>
              <th scope="col">Nome do Procedimento</th>
              <th></th>                   
            </tr>
          </thead>
          <tbody id = "tbodyCadastro">
            <?php
              include_once 'conexao.php';
              $sql = "SELECT * FROM procedimento_tipo";
              $busca = mysqli_query($con, $sql);
              while($array = mysqli_fetch_array($busca)){                       
              $nome = $array['nome']; 
            ?>
            <tr>
              <td><?php echo $nome?></td>                
             <td class = "d-flex justify-content-end">
                  <a class="btn btn-warning btn-sm mr-3"  style="color:#fff" href="editarProcedimentos.php?id=<?php echo $array['id'] ?>" role="button"><i class="fa fa-pencil-square-o"></i> Editar</a> 
                  <a class="btn btn-danger btn-sm"  style="color:#fff" onclick = "excluirProcedimento(<?php echo $array['id']?>)" role="button"><i class="fa fa-trash-o"></i> Excluir</a>
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