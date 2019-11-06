<!DOCTYPE html>
<html>
  <head>
    <title>Relatório</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="styleHome.css">
    <link rel="stylesheet" type="text/css" href="styleHeader.css">
  </head>
  <body>    
          <?php include 'header.php'?>
    <div class = "d-flex justify-content-end">
      <h5 class = "ml-4">*Marque as opções, depois clique em gerar relatório</h5>
    </div>
    
<div class="container">
      <!-- Módulos -->
      <h4>Módulo</h4>
      <div class="row">
          <div class="col-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">Cadastro</label>
              </div>
          </div>
          <div class="col-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">Agenda</label>
              </div>
          </div>
          <div class="col-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">Ficha</label>
              </div>
          </div>
          <div class="col-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">Estoque</label>
              </div>
          </div>
      </div>
  
  <!-- Contexto -->
   
   <h4 class="mt-4">Contexto</h4>
   
   <div class="row">
       <div class="col-4">
           <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">Cadastro -> Nome</label>
          </div>
       </div>
       <div class="col-4">
           <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">Cadastro -> Orçamento</label>
          </div>
       </div>
       <div class="col-4">
           <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">Agenda -> Dentista</label>
          </div>
       </div>
   </div>
   
   <div class="row">
       <div class="col-4">
           <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">Agenda -> Consulta</label>
          </div>
       </div>
       <div class="col-4">
           <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">Arquivo -> Ficha</label>
          </div>
       </div>
       <div class="col-4">
           <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">Arquivo -> Procedimento</label>
          </div>
       </div>
   </div>
   
   
   <div class="row">
       <div class="col-4">
           <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">Ficha -> Situação</label>
          </div>
       </div>
       <div class="col-4">
           <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">Estoque -> Disponivel</label>
          </div>
       </div>
       <div class="col-4">
           <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">Estoque -> Validade</label>
          </div>
       </div>
   </div>
   
  <!-- Ações -->
   <h4 class="mt-4">Ações</h4>
   <div class="row">
       <div class="col-3">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">Realizada</label>
          </div>
       </div>
       <div class="col-3">
           <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">Agendada</label>
          </div>
       </div>
       <div class="col-3">
           <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">Confirmada</label>
          </div>
       </div>
       <div class="col-3">
           <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">Cancelada</label>
          </div>
       </div>
   </div>
   
   <h4 class="mt-4">Período</h4>
   <div class="row">
       <div class="col-md-4">
           <div class="form-group">
                <label for="De">De</label>
                <input type="date" class="form-control w-100" id="De" placeholder="" name = "De">
            </div>  
       </div>
       <div class="col-md-4">
            <div class="form-group">
                <label for="Até">Até</label>
                <input type="date" class="form-control w-100" id="Até" placeholder="" name = "Até">
            </div>
            
       </div>
       <div class="col-md-4"><button type="button" class="btn btn-dark">Gerar Relatório</button>
   </div>
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Validade</th>
          <th scope="col">Disponivel</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="font-weight-bold" scope="row">Gaze</td>
          <td>10/06/2020</td>
          <td>10</td>
        </tr>
        <tr>
          <td class="font-weight-bold" scope="row">Touca</td>
          <td>10/06/2020</td>
          <td>5</td>
        </tr>
        <tr>
          <td class="font-weight-bold" scope="row">Gaze</td>
          <td>10/06/2020</td>
          <td>10</td>
        </tr>
      </tbody>
    </table>
    </div>
  </body>
</html>