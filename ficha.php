<!DOCTYPE html>
<html>
	<head>
		<title>Odonto - Ficha</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="styleHeader.css">
        <script>
            function excluir(id){
                if(confirm('Deseja realmente excluir esta ficha?')){
                    location.href = 'deletarFicha.php?id=' + id;   
                }
            }
        </script>
	</head>
	<body>
		
		<?php include 'header.php'?>
        <?php
            $id = $_GET['id'];
            include_once 'conexao.php';
            $sql = "SELECT * FROM paciente WHERE id = $id";
            $busca = mysqli_query($con, $sql);

            while($array = mysqli_fetch_array($busca)){
                $idFicha = $array['id'];
                $nome = $array['nome'];
                $email = $array['email'];
                $cpf = $array['cpf'];
                $rg = $array['rg'];
                $telefone = $array['telefone'];
                $celular = $array['celular'];
                $cep = $array['cep'];
                $endereco = $array['endereco'];
                $bairro = $array['bairro'];
                $nascimento = $array['nascimento'];
                $cidade = $array['cidade'];
                $uf = $array['uf'];
                $doencabase = $array['doencabase'];
                $alergia = $array['alergia'];
                $medicamentos = $array['medicamentos'];
                $cirurgia = $array['cirurgia'];
                $internacoes = $array['internacoes'];
                $pa = $array['pa'];
                $queixaprinc = $array['queixaprinc'];
                $situacaoficha = $array['situacaoficha'];
                $orcamento = $array['orcamento'];
                $complemento = $array['complemento'];
            }
        ?>
        <h4 class="text-center mb-2">Dra. ADRIANE B. PIRES MAIA</h4>
        <h4 class="text-center mb-2">Dra. CRISTIANI B. PIRES SANT'ANNA</h4>
        <h1 class = "text-center mb-4">Ficha do Paciente - <?php echo $nome?></h1>
        <div class = "row">
            <div class = "col"></div>
            <div class = "col-md-6">
                <input type="button" class ="btn btn-dark ml-2" onclick="window.print();" value="Imprimir">

                <a href="cadastro.php"><button class = "btn btn-primary ml-2" type="buton" name="voltar">Voltar</button></a>
                <div class = "form-row d-flex justify-content-end">
                    <div class = "form-group col-md-2">
                        <label for = "nFicha"> Nº da Ficha</label>
                        <input class = "form-control" type="number" name="numeroFicha" value = "<?php echo $idFicha?>" disabled>
                    </div>
                </div>

                <div class = "mb-2 text-center">
                    <h5>Dados Pessoais</h5>
                </div>  

                <div class = "form-row">
                    <div class="form-group w-100 col-md-2">
                        <label for="cpf">CPF:</label>
                        <input type="text" class="form-control" id="cpf" placeholder="" name = "cpf" value = "<?php echo $cpf?>" disabled>
                    </div>
                    <div class="form-group w-100 col-md-2">
                        <label for="rg">RG:</label>
                        <input type="text" class="form-control" id="rg" placeholder="" name = "rg" value = "<?php echo $rg?>" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" placeholder="" name = "nome" value = "<?php echo $nome?>" disabled>
                    </div>
                </div>
                <div class = "form-row">
                    <div class="form-group col-md-4">
                        <label for="nascimento">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="nascimento" placeholder="" name = "nascimento" value = "<?php echo $nascimento?>" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="" name = "email" value = "<?php echo $email?>" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="orcamento">Orçamento:</label>
                        <input type="text" class="form-control" id="orcamento" placeholder="" name = "orcamento" value = "<?php echo $orcamento?>" disabled>
                    </div>
                </div>

                <div class = "form-row">
                    <div class="form-group col-md-6">
                        <label for="telefone">Telefone:</label>
                        <input type="text" class="form-control" id="telefone" placeholder="" name = "telefone" value = "<?php echo $telefone?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="celular">Celular:</label>
                        <input type="text" class="form-control" id="celular" placeholder="" name = "celular" value = "<?php echo $celular?>" disabled>
                    </div>
                </div>     

                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="endereco">Endereço:</label>
                        <input type="endereco" class="form-control" id="endereco" placeholder="" name = "endereco" value = "<?php echo $endereco?>" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="bairro">Bairro:</label>
                        <input type="text" class="form-control" id="bairro" placeholder="" name = "bairro" value = "<?php echo $bairro?>" disabled>
                    </div> 
                    <div class="form-group col-md-3">
                        <label for="cep">CEP:</label>
                        <input type="text" class="form-control" id="cep" placeholder="" name = "cep" value = "<?php echo $cep?>" disabled>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="Cidade">Cidade:</label>
                        <input type="text" class="form-control" id="Cidade" name = "cidade" value = "<?php echo $cidade?>" disabled>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="UF">UF:</label>
                        <input type="text" class="form-control" name = "uf" id="UF" value = "<?php echo $uf?>" disabled>
                    </div>
                </div>
                <div class = "form-row">
                    <div class="form-group col-md-9">
                        <label for="Complemento">Complemento:</label>
                        <input type="text" class="form-control" id="Complemento" placeholder="" name = "complemento" value = "<?php echo $complemento?>" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Situação (Ficha):</label>
                        <input class = "form-control" type="text" name="situacaoficha" value = "<?php echo $situacaoficha?>" disabled>
                    </div>
                </div>
                <div class = "text-center">
                    <h5>Anamnese</h5>
                </div>  
                <div class="form-group">
                    <label for="data">Doenças (Base):</label>
                    <input type="text" class="form-control" id="doencabase" placeholder="" name = "doencabase" value = "<?php echo $doencabase?>" disabled>
                </div>

                <div class="form-group">
                    <label for="alergia">Alergias:</label>
                    <input type="text" class="form-control" id="alergia" placeholder="" name = "alergia" value = "<?php echo $alergia?>" disabled>
                </div> 
                <div class="form-group">
                    <label for="medicamentos">Medicamentos:</label>
                    <input type="text" class="form-control" id="medicamentos" placeholder="" name = "medicamentos" value = "<?php echo $medicamentos?>" disabled>
                </div>

                <div class="form-group">
                    <label for="cirurgia">Cirurgias:</label>
                    <input type="text" class="form-control" id="cirurgia" placeholder="" name = "cirurgia" value = "<?php echo $cirurgia?>" disabled>
                </div>
                <div class="form-group">
                    <label for="internacoes">Internacões:</label>
                    <input type="text" class="form-control" id="internacoes" placeholder="" name = "internacoes" value = "<?php echo $internacoes?>" disabled>
                </div>

                <div class="form-group">
                    <label for="pa">P.A:</label>
                    <input type="text" class="form-control" id="pa" placeholder="" name = "pa" value = "<?php echo $pa?>" disabled>
                </div>
            </div>

            <div class = "col-md-4 overflow-auto" style = "top:160px; max-height: 970px">
                <table class="table w-100 mt-4 table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Procedimento </th>
                            <th scope="col">Data</th>
                            <th scope="col">Valor</th>
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
                                p.id As paciente_id,
                                a.data As atendimento_data
                                FROM procedimento pr, procedimento_tipo prt, paciente p, atendimento a
                                WHERE
                                prt.id = pr.procedimento_tipo_id
                                AND
                                p.id = a.paciente_id
                                AND
                                a.id = pr.atendimento_id
                                AND
                                paciente_id = $id ORDER BY atendimento_data";
                            $busca = mysqli_query($con, $sql);

                            while($array = mysqli_fetch_array($busca)){
                                $id     = $array['procedimento_nome'];
                                $data1   = $array['atendimento_data'];
                                $valor  = $array['valor'];
                                $obs    = $array['obs'];

                                $data = explode('-', $data1);
                                $newData = $data[2] . "-" . $data[1]. "-" . $data[0];
                        ?>
                            <tr>                                    
                                <td><?php echo $id ?></td>
                                <td><?php echo $newData?></td>                                  
                                <td>R$ <?php echo $valor ?></td>
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